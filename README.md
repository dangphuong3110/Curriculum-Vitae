# Curriculum-Vitae
Nơi lưu trữ Project01 - Curriculum Vitae

(*) Lưu ý sau khi clone repository: 
1. Cài đặt các dependencies: Sau khi clone dự án, cần chạy lệnh "composer install" trong thư mục gốc của dự án để cài đặt các gói phụ thuộc được định nghĩa trong file composer.json
2. Sau khi cài đặt dependencies, cần tạo một bản sao của file ".env.example" và đổi tên thành ".env". Sau đó, cần điều chỉnh các giá trị trong file ".env" để phù hợp với môi trường cài đặt. (Example: Cấu hình CSDL, APP_KEY,...)
3. Sau khi tạo file ".env", cần chạy lệnh "php artisan key:generate" để sinh ra khóa ứng dụng và cập nhật giá trị "APP_KEY" trong file ".env"
4. Tạo cơ sở dữ liệu tương ứng và cập nhật các thông tin cấu hình CSDL trong file ".env"
5. Chạy lệnh "php artisan migrate" để thực thi các migration và tạo bảng trong CSDL (sau đó có thể chạy lệnh "php artisan db:seed --class=..." để truyền dữ liệu đã được tạo sẵn thông qua Seeder)
