-- Tạo bảng sản phẩm
CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url VARCHAR(500)
);

-- Thêm dữ liệu mẫu (để lúc lên web nhìn cho đỡ trống)
INSERT INTO Products (name, price, description, image_url) VALUES 
('Cà phê đen đá', 25000, 'Cà phê nguyên chất đậm đà', 'https://product.hstatic.net/1000075078/product/ca-phe-den-da_472506_77c7770176b64f4384b25de026f1c4df_large.jpg'),
('Bạc xỉu', 35000, 'Nhiều sữa ít cà phê', 'https://product.hstatic.net/1000075078/product/bac-xiu-da_969046_5f6e866e4404419ea73059f3de49df1f_large.jpg'),
('Trà đào cam sả', 45000, 'Thanh mát giải nhiệt', 'https://product.hstatic.net/1000075078/product/tra-dao-cam-sa-da_391167_40579f18731349478a572624df42d453_large.jpg');