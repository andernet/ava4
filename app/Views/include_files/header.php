<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <title>Users</title>
    <script>
        function confirma() {
            if (!confirm('Desejar excluir o usuário?')) {
                return false;
            }

            return true;
        }
    </script>
</head>
<body>