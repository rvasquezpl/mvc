CREATE  TABLE users
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  users_group_id INT,
  first_name VARCHAR(40),
  last_name VARCHAR(4),
  email VARCHAR(96),
  password VARCHAR(40),
  gender VARCHAR(5),
  birthday INT,
  image VARCHAR(50),
  created INT,
  status VARCHAR(20),
  ip VARCHAR(32),
  code VARCHAR(40)
);

CREATE TABLE users_groups
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40)
);

CREATE TABLE permissions
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  users_group_id INT,
  rules TEXT,
  FOREIGN KEY (id) REFERENCES users_groups(id)
);
