import sqlite3

conn = sqlite3.connect('employee.db')
c = conn.cursor()
# emp_1 = Employee('43A32921', 'Đỗ Phương Thảo', 906557066)
# print(emp_1.get_bienso)

# c.execute("""CREATE TABLE employees (
#     bienso text, tenchuxe text, sodienthoai integer)""")
# c.execute("INSERT INTO employees VALUES ('98V93205','Phạm Thị Trình Tin', 0123567890)")
# c.execute("INSERT INTO employees VALUES ('37C49267','Ngô Hoàng Minh', 0943508671)")
# c.execute("INSERT INTO employees VALUES ('66L140588','Nguyễn Thị Thu Giang', 0127896457)")
# c.execute("INSERT INTO employees VALUES ('75K2607','Lê Văn ĐỨc', 0916570394)")
# c.execute("INSERT INTO employees VALUES ('73B120054','Nguyễn Viết Danh', 0912387645)")
# c.execute("INSERT INTO employees VALUES ('23A12345','Trần Minh Vũ', 0125098349)")
# c.execute("INSERT INTO employees VALUES ('43S2996','Ngô Xuân Thắng', 0987154672)")

conn.commit()

c.execute("SELECT * FROM employees ")
rows = c.fetchall()
for r in rows:
    print(r)
conn.commit()

conn.close()