#include<Servo.h>
Servo servo;
int angle;
int vi=7;
int led=13;
int us=2;
int calibrationTime = 30;        
long unsigned int lowIn;
long unsigned int pause = 5000;  
boolean lockLow = true;
boolean takeLowTime;  
int pirPin = 3;
void setup() {
pinMode(led,OUTPUT);
pinMode(us,OUTPUT);
pinMode(vi,INPUT);
Serial.begin(9600);
servo.attach(8);
servo.write(angle);
pinMode(pirPin, INPUT);
digitalWrite(pirPin, LOW);
Serial.print("calibrating sensor ");
for(int i = 0; i < calibrationTime; i++)
{
  Serial.print(".");
  delay(1000);
}
  Serial.println(" done");
  Serial.println("SENSOR ACTIVE");
  delay(50);
}
void loop() 
{
  int shake=digitalRead(vi);
  //Serial.print(shake);
  delay(100);
  3
  if(digitalRead(pirPin) == HIGH)
  {
     digitalWrite(us,HIGH);
     if(lockLow)
     {  
         lockLow = false;            
         Serial.println("---");
         Serial.print("motion detected at ");
         Serial.print(millis()/1000);
         Serial.println(" sec"); 
         delay(50);
      }         
     takeLowTime = true;
     int i;
     
    for(i=0;i<=180;i++)
  {
   servo.write(i); 
   if(i%5==0)
   {
     digitalWrite(led, HIGH);
   }
   if(i%10==0)  
   {
      digitalWrite(led, LOW);
   }
    delay(15);
  }

for(i=180;i>=0;i--)
{
   if(i%5==0)
    {
      digitalWrite(led, HIGH);
    }
 if(i%10==0)   
    {
      digitalWrite(led, LOW);
    }
  delay(15);
 servo.write(i);
 }
          //the led visualizes the sensors output pin state
       
}
if(digitalRead(pirPin) == LOW)
{
       digitalWrite(us,LOW);
        if(takeLowTime)
        {
             lowIn = millis();   
             takeLowTime = false;       
        }
        
        if(!lockLow && millis() - lowIn > pause)
        {  
                lockLow = true;                        
              Serial.print("motion ended at ");      //output
              Serial.print((millis() - pause)/1000);
              Serial.println(" sec");
               delay(50);
        }
}
/*  int point=2.4;
  HTTPClient http;
  String url ="http://192.168.2.119/inno/updateraw.php?Point=";
  url.concat(point);
  url.concat("&flag=");
  url.concat(flag);
  Serial.println(url.c_str());
  http.begin(url);
  int httpCode=http.GET();
  if(httpCode)
  {
    String payload=http.getString();
    Serial.println(payload);
  }
  http.end();*/
}



