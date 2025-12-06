<?php
session_start();

if(!isset($_SESSION['usuario_logado'])){
    header("Location: $APP_URL", true, 302);
    exit();
}

include_once "includes/header.php";
?>

<style>
    .linha-vertical{
        border-left: 2px solid;
        box-sizing: border-box;
        height: 30px;
        margin-left: 10px;
    }
</style>

<div class="container wrapper">
    <header>
        <div class="header-info">

            <div class="logo-chat">
                <h1>Home Chat</h1>
            </div>

            <div class="profile-summary">
                <span> <?php echo $_SESSION['usuario_logado']; ?> </span>
                <span class="online-status">Online</span>
                <a href='<?php echo "$APP_URL/settings"; ?>' class="logout">Settings</a>
                <div class="linha-vertical"></div>
                <a href='<?php echo "$APP_URL/sair"; ?>' class="logout">Logout</a>
            </div>
            
            <div class="profile-image-container">
                <?php if(empty($_SESSION['foto_de_perfil'])): ?>
                    <img src="../../../chat/resources/assets/img/user_996351.png" >
                <?php else: ?>
                    <img src="../../../chat/resources/<?php echo $_SESSION['foto_de_perfil']; ?>" alt="<?php echo $_SESSION['foto_de_perfil']; ?>">
                <?php endif; ?>    
            </div>

        </div>
    </header>

    <div class="container main-layout">
        
        <div class="chat-view">
            <div class="contact-msg">
                <span class="contact-name">Fulano da Silva</span>
                <span class="status">Online</span>
            </div>

            <div class="conversation">
                
                <div class="msg-received">
                    Olá!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Perferendis nihil ullam 
                </div>

                <div class="msg-sent">
                    Oi!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Perferendis nihil ullam
                </div>
                 <div class="msg-received">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil.
                </div>

                <div class="msg-sent">
                    Consectetur adipisicing elit. 
                </div>

                <div class="msg-received">
                    Blábla bla Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil.
                </div>

                <div class="msg-sent">
                    Consectetur adipisicing elit. 
                </div>

            </div>

            </div>

        <aside class="contact-list"> <div class="search">
                <label for="search-input">Pesquisar contato</label>
                <input type="text" class="form-control" id="search-input" placeholder="Pesquisar">
            </div>

            <div class="contacts-container">
                <div class="friend-item">
                    <img src="../../../chat/resources/assets/img/h.jpeg" alt="Foto de Perfil">
                    <div class="friend-info">
                        <span class="friend-name">Fulano da Silva</span>
                    </div>
                    <span class="status">Online</span>
                </div>

                <div class="friend-item">
                    <img src="../../../chat/resources/assets/img/m.jpeg" alt="Foto de Perfil">
                    <div class="friend-info">
                        <span class="friend-name">Beltrano dos Santos</span>
                    </div>
                    <span class="status">Online</span>
                </div>

                <div class="friend-item">
                    <img src="../../../chat/resources/assets/img/m.jpeg" alt="Foto de Perfil">
                    <div class="friend-info">
                        <span class="friend-name">Ciclano de Tal</span>
                    </div>
                    <span class="status">Online</span>
                </div>
            </div>

        </aside>
    </div>

</div>

<?php
    include_once "includes/footer.php";
?>