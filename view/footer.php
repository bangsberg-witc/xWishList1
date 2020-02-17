        
            <footer>
                <p class="copyright">&copy; <?php echo date("Y"); ?> Demo ASG 12 WishList</p>
                 <h1><?php 
                if(isset($_SESSION['User']) && isset($_SESSION['UserID']))
                    echo 'Welcome '.$_SESSION['User'].' UserID: '.$_SESSION['UserID'];
                else 
                    echo '';
                   ?></h1>
                
            </footer>
        </main>
    </body>
</html>

