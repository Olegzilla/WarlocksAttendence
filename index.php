<html>
    <head><title>Warlock Attendence</title></head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <body>
        <form action="_enviar.php" method="POST">
            <label>Raid</label>
            <input type="text" name="raid" placeholder="Digite o nome da raid" required/>
            
            <label>Data e horário</label>
            <input type="text" name="datahora" placeholder="Digite a data e horário" required/>
            
            <label>Nome do jogador</label>
            <input type="text" name="nome1" placeholder="Digite o nome jogador" />
            
            <label>Nome do jogador</label>
            <input type="text" name="nome2" placeholder="Digite o nome jogador" />
            
            <label>Nome do jogador</label>
            <input type="text" name="nome3" placeholder="Digite o nome jogador" />
            <button type="submit">ENVIAR</button>
        </form>
    </body>
</html>