import glob
import re

import cv2
import numpy as np
from lib_detection import load_model, detect_lp, im2single
# import json
# import sys
success = []
fail = []
def read_plate_again(img_path_input):
    plate_info = ""
    # Ham sap xep contour tu trai sang phai
    def sort_contours(cnts):
        reverse = False
        i = 0
        boundingBoxes = [cv2.boundingRect(c) for c in cnts]
        (cnts, boundingBoxes) = zip(*sorted(zip(cnts, boundingBoxes),
                                            key=lambda b: b[1][i], reverse=reverse))
        return cnts

    # Ham fine tune bien so, loai bo cac ki tu khong hop ly
    def fine_tune(lp):
        # Dinh nghia cac ky tu tren bien so41616
        char_list = '0123456789ABCDEFGHKLMNPRSTUVXYZ'
        newString = ""
        for i in range(len(lp)):
            if lp[i] in char_list:
                newString += lp[i]
        return newString


    # Đường dẫn ảnh, các bạn đổi tên file tại đây để thử nhé
    # img_path = "test/43A41130.jpg"

    # Load model LP detection
    wpod_net_path = "../wpod-net_update1.json"
    wpod_net = load_model(wpod_net_path)

    # Đọc file ảnh đầu vào
    Ivehicle = cv2.imread(img_path_input)

    # Kích thước lớn nhất và nhỏ nhất của 1 chiều ảnh
    Dmax = 608
    Dmin = 288

    # Lấy tỷ lệ giữa W và H của ảnh và tìm ra chiều nhỏ nhất
    ratio = float(max(Ivehicle.shape[:2])) / min(Ivehicle.shape[:2])
    side = int(ratio * Dmin)
    bound_dim = min(side, Dmax)

    _, LpImg, lp_type = detect_lp(wpod_net, im2single(Ivehicle), bound_dim, lp_threshold=0.5)

    # Cau hinh tham so cho model SVM
    digit_w = 30  # Kich thuoc ki tu
    digit_h = 60  # Kich thuoc ki tu

    model_svm = cv2.ml.SVM_load('../trainSVM/svm.xml')

    if (len(LpImg)):

        # Chuyen doi anh bien so
        LpImg[0] = cv2.convertScaleAbs(LpImg[0], alpha=(255.0))

        roi = LpImg[0]

        # Chuyen anh bien so ve gray
        gray = cv2.cvtColor(LpImg[0], cv2.COLOR_BGR2GRAY)

        # Ap dung threshold de phan tach so va nen
        # binary = cv2.threshold(gray, 180, 255,
        #                        cv2.THRESH_BINARY_INV)[1]
        binary = cv2.adaptiveThreshold(gray,255,cv2.ADAPTIVE_THRESH_MEAN_C,cv2.THRESH_BINARY_INV,
                                           blockSize=23,
                                           C=15)
        # cv2.imshow("Anh bien so sau threshold", binary)
        # cv2.waitKey()

        # Segment kí tự
        kernel3 = cv2.getStructuringElement(cv2.MORPH_RECT, (3, 3))
        thre_mor = cv2.morphologyEx(binary, cv2.MORPH_DILATE, kernel3)
        cont, _ = cv2.findContours(thre_mor, cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)



        for c in sort_contours(cont):
            (x, y, w, h) = cv2.boundingRect(c)
            ratio = h / w
            if 1.3 <= ratio <= 4:  # Chon cac contour dam bao ve ratio w/h
                if 0.8> h / roi.shape[0] >= 0.55:  # Chon cac contour cao tu 60% bien so tro len

                    # Ve khung chu nhat quanh so
                    cv2.rectangle(roi, (x, y), (x + w, y + h), (0, 255, 0), 2)

                    # Tach so va predict
                    curr_num = thre_mor[y:y + h, x:x + w]
                    curr_num = cv2.resize(curr_num, dsize=(digit_w, digit_h))
                    _, curr_num = cv2.threshold(curr_num, 30, 255, cv2.THRESH_BINARY)
                    curr_num = np.array(curr_num, dtype=np.float32)
                    curr_num = curr_num.reshape(-1, digit_w * digit_h)

                    # Dua vao model SVM
                    result = model_svm.predict(curr_num)[1]
                    result = int(result[0, 0])

                    if result <= 9:  # Neu la so thi hien thi luon
                        result = str(result)
                    else:  # Neu la chu thi chuyen bang ASCII
                        result = chr(result)

                    plate_info += result

    return fine_tune(plate_info)

        # cv2.imshow("Cac contour tim duoc", roi)
        # cv2.waitKey()

        # Viet bien so len anh
        # cv2.putText(Ivehicle, fine_tune(plate_info), (50, 50), cv2.FONT_HERSHEY_PLAIN, 3.0, (0, 0, 255),
        #             lineType=cv2.LINE_AA)

        # Hien thi anh
        # print("Bien so=", plate_info)
        # cv2.imshow("Hinh anh output", Ivehicle)
        # cv2.waitKey()

    # cv2.destroyAllWindows()
#----------------------------------------------------------------------
filenames = glob.glob("test2/*.jpg")
num_plate = []
for f in filenames:
    numeric_string = f.replace('test2\\', '')
    # print(numeric_string)
    numeric_string = numeric_string.replace('.jpg', '')
    #print(numeric_string)
    num_plate.append(numeric_string)
# print(num_plate)

#----------------------------------------------------------------------
i = 0
for f in filenames:
    plate_found = read_plate_again(f)
    if plate_found in num_plate:
        print("TRUE")
        success.append(plate_found)
    else:
        print("FALSE")
        fail.append(plate_found)
    print(num_plate[i])
    print("----------------------------------------------------")
    i +=1
print(success)
print(fail)
percent = (len(success)/len(num_plate))*100
print("Ti le tim dung: " + str(percent))


