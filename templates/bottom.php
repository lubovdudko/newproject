</div>
			<div class="col-md-2">
				<div class="right">
					<div class="login"><p>Логин</p>
					<INPUT class="field" TYPE="text" SIZE=20 NAME=user>
					<p>Пароль</p>
					<INPUT  class="field" TYPE="password" NAME=pw SIZE=20 MAXLENGTH=10>
					<br><br><?php
	if($_SESSION['id_user_position']){
?>
<p><a href="logout.php">Выйти</a><br><a href="kab.php">Кабинет пользователя</a></p>
<?php
		}
	else{
?>
<p><a href="login.php">Войти</a><br><a href="reg.php">Регистрация</a></p>
<?php
		}
?>
					</div>
				</div>
			</div>
		</div>
		<div class="button"><button>Анютины глазки</button><button>Цветы</button></div>
		<div id="footer">
		
		</div>
	</body>
</html>