<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>

    <table>
        <tr>
            <th>Nome</th>
            <th>Autor</th>
            <th>Genero</th>
            <th>IsBn</th>
            <th>Descrição</th>
        </tr>
            <tbody>
                @foreach($books_dados as $book)
                    <td>{{$book->name}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->genre}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->description}}</td>
                @endforeach
            </tbody>
        </tr>
    </table>
</body>
</html>
