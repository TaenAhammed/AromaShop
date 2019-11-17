<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create product</title>
</head>

<body>
    <form action="/admin/products" method="POST">
        @csrf
        <table>
            <tr>
                <td>name: </td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>image: </td>
                <td>
                    <input type="text" name="image">
                </td>
            </tr>
            <tr>
                <td>price: </td>
                <td>
                    <input type="text" name="price">
                </td>
            </tr>
            <tr>
                <td>category: </td>
                <td>
                    <input type="text" name="category">
                </td>
            </tr>
            <tr>
                <td>discount: </td>
                <td>
                    <input type="text" name="discount">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>