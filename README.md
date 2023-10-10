#### Project Idea
1. Khách hàng đến trung tâm sửa xe, cung cấp thông tin cá nhân và thông tin xe. Sau đó cung cấp thông tin sơ bộ tình trạng xe, mong muốn làm gì,...
2. Trung tâm dựa vào thông tin xe khách hàng cung cấp, bắt đầu lựa chọn công thợ, phụ tùng.
3. Tổng hợp tất cả thông tin trên thành 1 bảng báo giá đồng thời gửi file báo giá cho Khách hàng.

--

1. KH hoặc NV đều có thể tạo thông tin KH.
2. KH hoặc NV đều có thể tạo thông tin Xe.
3. NV có thể tạo Công thợ và Phụ tùng.
4. NV có thể chọn Công thợ và Phụ tùng cho Báo giá.
5. NV có thể tạo Báo giá.

#### Table Structure
1. Customers
    - name (string) {required}
    - phone (string) {required}
    - address (string) {nullable}
    - email (string) {nullable}

2. Cars
    - name (string) {nullable}
    - license_plates (string) {nullable}
    - manufacturer (string) filled by laravel
    - year_manufacture (integer) {nullable}
    - customer_id {required} filled by laravel

3. Workers:
    - name (string) {nullable}
    - unit (string) {nullable}
    - price (bigInteger) {unsigned, default: 0}

4. Products:
    - name (string) {required}
    - unit (string) {required}
    - price (bigInteger) {unsigned, default: 0}
    - images (string) {nullable}

5. Quotes:
    - speedometer (integer) {nullable, unsigned}
    - info (string)
    - received_date (datetime) {nullable}
    - delivery_date (datetime) {nullable}
    - car_id {required}
    - customer_id {required}

6. QuoteWorkers:
    - quote_id {required}
    - worker_id {required}
    - quantity {default: 1}

7. QuoteProducts:
    - quote_id {required}
    - product_id {required}
    - quantity {default: 1}