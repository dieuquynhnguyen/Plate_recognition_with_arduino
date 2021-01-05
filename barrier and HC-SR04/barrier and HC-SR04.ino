#include<Servo.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

Servo myservo;
int data;
const int trigPin = 11;
const int echoPin = 10;

long tmeduration;
int distance;

void setup() {
  myservo.attach(12);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0,1);
  lcd.print("Welcome");
  Serial.begin(9600);
}
void loop() {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  //   ---------------------------------
  tmeduration = pulseIn(echoPin, HIGH);
  distance = (0.034 * tmeduration) / 2;
  Serial.println(distance);
  delay(200);
  myservo.write(0);
  //-----------------------------
  while (Serial.available() > 0)
  {
    data = Serial.read();
    if (data == 't')
    {
      myservo.write(90);
      lcd.setCursor(0, 0);
      lcd.print("Hop le");
      lcd.setCursor(0,1);
      while(Serial.available() > 0){
        lcd.print("Bien:");
        lcd.print(Serial.readString());
      }
      delay(30000);
      myservo.write(0);
    }
    else if (data == 'f')
    {
      myservo.write(0);
      lcd.setCursor(0, 0);
      lcd.print("Khong hop le");
      lcd.setCursor(0,1);
      while(Serial.available() > 0){
        lcd.print("Bien so:");
        lcd.print(Serial.readString());
      }
    }
  }
  delay(1000);
}
