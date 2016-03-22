<?php
namespace Model;
/**
 *
 */
class Editors extends Model
{

    protected $table = 'editors';

    public function getEditorsByBookId($id)
    {
        $sql = '
            SELECT DISTINCT editors.*
            FROM editors
            JOIN books
            ON editors.id = books.editor_id
            WHERE books.id =:id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }
    public function getEditorsByAuthorId($id)
    {
        $sql = '
            SELECT DISTINCT editors.*
            FROM editors
            JOIN books ON editors.id = books.editor_id
            JOIN author_book ON books.id = author_book.book_id
            JOIN authors ON author_book.author_id = authors.id
            WHERE authors.id =:id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

}
