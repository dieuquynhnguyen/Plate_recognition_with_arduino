import serial
import time
import cv2
import sqlite3
import read_plate
import datetime
import mysql.connector

exist =[]

raw_distances= []
ser = serial.Serial('COM9', 9600)
time.sleep(6)

def get_datetime():
    x = datetime.datetime.now().strftime("%d/%m/%Y %H:%M")
    return x

def check_plate(plate):
    conn = sqlite3.connect('database/employee.db')
    c = conn.cursor()
    c.execute("SELECT * FROM employees WHERE bienso=?", (plate,))
    exist = c.fetchone()
    print(exist)
    if exist is not None:
        return exist
    else:
        return None
def insert_into_database(emp):
    # establishing the connection
    conn = mysql.connector.connect(user='root', password='', host='127.0.0.1',port='3316',
                                   database='doan_kientruc')
    # Creating a cursor object using the cursor() method
    cursor = conn.cursor()
    # Preparing SQL query to INSERT a record into the database.
    sql = """INSERT INTO dulieuxevaora(biensoxe, tenchuxe, gioxevao, sodienthoai)
        VALUES(%s, %s, %s, %s)"""
    values = (emp[0], emp[1], get_datetime(), emp[2])
    try:
        # Executing the SQL command
        cursor.execute(sql, values)
        # Commit your changes in the database
        conn.commit()
    except:
        # Rolling back in case of error
        conn.rollback()
    # Closing the connection
    print(cursor.rowcount, "record inserted.")
    conn.close()
def main():
    count = 0
    while count < 5:
        ardata = float(ser.readline().decode('ascii').rstrip())
        raw_distances.append(ardata)
        count += 1
    print("Giá trị các khoảng cách: ")
    print(raw_distances)
    distance = sum(raw_distances) / len(raw_distances)
    print("Giá trị trung bình khoảng cách: " + str(distance))

    # --------------------------------------------------------
    if distance < 10:
        cap = cv2.VideoCapture('http://172.20.10.7:8080/video')
            # cap = cv2.VideoCapture('http://192.168.1.3:8080/video')
            # cap = cv2.VideoCapture(0)
        while True:
            ret, frame = cap.read()
            cv2.imshow("Capturing", frame)
            cv2.imwrite(filename='saved_img.jpg', img=frame)
            cap.release()
            cv2.destroyAllWindows()
            break
    #-----------------------------------------------------------------
    plate = read_plate.read_plate()
    print("Biển số xe tìm được: " + plate)
    info = check_plate(plate)
    if(info is not None):
        ser.write(b't')
        print("Found")
        ser.write(plate.encode("ascii"))
        insert_into_database(info)
    else:
        ser.write(b'f')
        print("Fail")
        ser.write(plate.encode("ascii"))
    #-----------------------------------------------------------------


if __name__ == "__main__":
    main()