# ใช้ PHP official image
FROM php:8.1-cli

# ตั้ง working directory
WORKDIR /app

# copy ไฟล์ทั้งหมดไปใน container
COPY . .

# รัน php built-in server ที่ port 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
