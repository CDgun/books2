<?php
namespace Model;
    /**
     *
     */
class Books extends Model
{
    protected $table = 'books';

    public function getBooksByAuthorId($id)
    {
        $sql = '
            SELECT DISTINCT books.*
            FROM books
            JOIN author_book
            ON books.id = author_book.book_id
            JOIN authors ON author_book.author_id = authors.id
            WHERE authors.id =:id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }
    public function getBooksByEditorId($id)
    {
        $sql = '
            SELECT DISTINCT books.*
            FROM books
            JOIN editors
            ON editors.id = books.editor_id
            WHERE editors.id =:id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

}
