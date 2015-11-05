-- Таблица книг
CREATE TABLE book (
  id INTEGER NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL
);

-- Таблица авторов книг
CREATE TABLE author (
  id INTEGER NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL
);

-- Связь книг и их авторов. Один автор может участвовать в написании нескольких книг
-- и в одной книге может быть несколько авторов.
-- Но один автор в одной и той же книге участвовать дважды не может.
CREATE TABLE book_author_rel (
  id INTEGER NOT NULL AUTO_INCREMENT,
  book_id INTEGER NOT NULL,
  author_id INTEGER NOT NULL,
  UNIQUE INDEX unq_book_author ( book_id, author_id ),
  FOREIGN KEY fk_book(book_id) REFERENCES book(id) ON DELETE CASCADE ,
  FOREIGN KEY fk_author(author_id) REFERENCES author(id) ON DELETE CASCADE
);