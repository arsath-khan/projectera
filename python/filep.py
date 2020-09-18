import tkinter as tk
import re
from tkinter import messagebox
from tkinter import *
import mysql.connector
import PIL

def data():
     regno=E1.get()
     stud=E2.get()
     dept=variable1.get()
     yr=variable2.get()
     sem=variable3.get()
     cour=variable4.get()
     em=E7.get()
     no=E8.get()
     db=mysql.connector.connect(host="localhost",user="root",password="@Arsathk54",database="arsath")
     cursor=db.cursor()
     cursor.execute('''INSERT INTO students(regno,student_name,department,years,semester,course,email,mobile) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)''',(regno,stud,dept,yr,sem,cour,em,no))
     db.commit()

top = tk.Tk()
top.title('Students Registration form')

ol1=("CSE","MECH","CIVIL","BME","ECE")
ol2=["1","2","3","4"]
ol3=["1","2","3","4","5","6","7","8"]
ol4=["16CS216","16IT212","16CS319","16ME121"]

variable1=tk.StringVar(top)
variable1.set(ol1[0])
variable2=tk.IntVar(top)
variable2.set(ol2[0])
variable3=tk.IntVar(top)
variable3.set(ol3[0])
variable4=tk.StringVar(top)
variable4.set(ol4[0])


L1 = tk.Label(top, text = "Registration Number:")
L1.place(x = 10,y = 10)
E1 = tk.Entry(top, bd = 5)
E1.place(x = 150,y = 10)


L2 = tk.Label(top,text = "Student Name:")
L2.place(x = 10,y = 40)
E2 = tk.Entry(top,bd = 5)
E2.place(x = 150,y = 40)


L3 = tk.Label(top,text = "Department:")
L3.place(x = 10,y = 80)
opt1 = tk.OptionMenu(top,variable1,*ol1)
opt1.place(x = 147,y = 80,width=135)

#year
L4 = tk.Label(top,text = "Year:")
L4.place(x = 10,y = 120)
opt2= tk.OptionMenu(top,variable2,*ol2)
opt2.place(x = 147,y = 120,width=135)

#sem
L5 = tk.Label(top,text = "Semester:")
L5.place(x = 10,y = 165)
opt3= tk.OptionMenu(top,variable3,*ol3)
opt3.place(x = 147,y = 165,width=135)

L6 = tk.Label(top,text = "Course:")
L6.place(x = 10,y = 210)
opt4= tk.OptionMenu(top,variable4,*ol4)
opt4.place(x = 147,y = 210,width=135)


#Email
L7 = tk.Label(top,text = "Email:")
L7.place(x = 10,y = 257)
E7 = tk.Entry(top,bd = 5)
E7.place(x = 150,y = 257)

#Mobile No
L8 = tk.Label(top,text = "Mobile Number:")
L8.place(x = 10,y = 300)
E8 = tk.Entry(top,bd = 5)
E8.place(x = 150,y = 300)

#validation
def validate():
    email=E7.get()
    num=E8.get()
    regi=E1.get()
    pattern=re.compile("^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$")
    pattern1=re.compile("[6-9][0-9]{9}")
    pattern2=re.compile("[0-9]{7}")
    if(pattern.match(email)):
        if(pattern1.match(num)):
           if(pattern2.match(regi)):
            messagebox.showinfo("succefully registered","thank you")
           else:
            messagebox.showinfo( "Unsuccessful Registration", " invlid registration number")
            
        else:
            messagebox.showinfo( "Unsuccessful Registration", "Phone number invlid")
    else:
        messagebox.showinfo( "Unsuccessful Registration", "Email Id invlid")
    data()


#submit button
B1 = tk.Button(top,text = "SUBMIT", command = validate)
B1.place(x = 20, y = 350)

#cancel Button
B2 = tk.Button(text = "CANCEL", command=top.destroy)
B2.place(x = 147, y = 350)


top.geometry("400x400")
top.mainloop()