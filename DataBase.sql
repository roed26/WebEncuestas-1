CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),
    photo BLOB,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE polls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    url TEXT,
    pstate VARCHAR(50),
    logo BLOB,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    qtype VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY poll_key (poll_id) REFERENCES polls(id)
);

CREATE TABLE answer (
    id INT NOT NULL,
    question_id INT NOT NULL,
    content VARCHAR(255) NOT NULL,
    FOREIGN KEY question_key (question_id) REFERENCES questions(id)
);

CREATE TABLE answer_text (
    id INT NOT NULL,
    question_id INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY question_key (question_id) REFERENCES questions(id)
);