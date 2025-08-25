# ใช้ PHP official image
FROM php:8.1-cli

# ตั้ง working directory
WORKDIR /app

# copy ไฟล์ทั้งหมดไปใน container
COPY . .

# ใช้ environment variable $PORT ที่ Render จะส่งเข้ามา
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t ."]
