<!DOCTYPE html>
<html>

<body>
    <div class="container">
        <h1 class="title">RSA Decryption</h1>
        <form class="form" action="encryptFile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload">
            <input type="submit" value="Submit">
        </form>

        <br />
        <p class="members">
            <strong>Team members</strong>
        <ul>
            <li class="members">Lizeth Estrada.</li>
            <li class="members">Juan Amador.</li>
            <li class="members">Salvador Sánchez.</li>
        </ul>
        </p>
    </div>
</body>
<style type="text/css">
    .container {
        width: 50%;
        margin: 0 auto;
        text-align: center;
    }

    .form {
        margin: 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    .title {
        text-align: center;
        font-size: 5rem;
        color: 'lila';
    }

    .members {
        color: 'gray';
    }
</style>

</html>