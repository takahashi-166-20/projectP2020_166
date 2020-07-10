CREATE TABLE addresses(
    id INTEGER NOT NULL AUTO_INCREMENT,
    name	VARCHAR(32) NOT NULL,
    address	VARCHAR(50) NOT NULL,
    phone	VARCHAR(32) NOT NULL,
    email	VARCHAR(32) NOT NULL,
    PRIMARY KEY(id)
);
INSERT INTO addresses VALUE(1,'工科 太郎', '八王子', '012-345-6789','tarou@exsample.com');
INSERT INTO addresses VALUE(2,'蒲田 花子', '蒲田', '987-654-3210', 'hanako@example.com');
SELECT * FROM addresses;
SELECT * FROM addresses WHERE address = "八王子";