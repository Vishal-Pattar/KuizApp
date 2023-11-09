import mysql.connector

mydb = mysql.connector.connect(host="localhost", user="root", password="", database="kuiz")
mycursor = mydb.cursor()

sqld = "DELETE FROM question_set_a"
mycursor.execute(sqld)
mydb.commit()

print("Records deleted successfully")