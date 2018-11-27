<?php	

	ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
require_once("core/global.php");
require_once("classes/Conexao.class.php");
require_once("classes/Usuario.class.php");
if(file_exists("instalador.php")){

	$_SESSION['msg'] = '<div class="alert alert-warning"><b>Cuidado</b> O Arquivo instalador.php é existente, deseja instalar o painel? <a href="/instalador.php">Clique aqui</a>, Caso contrário apague o arquivo!</div>';
}
$usuario = new Usuario();
if(isset($_SESSION['email']) && (isset($_SESSION['senha']))){
	
	header("Location: principal.php");
	
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Phanton Panel</title>
    <meta name="description" content="Gerencie o seu hotel bem de perto com o PhantonP técnologia nova da TwizerHost.">

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- css bootstrap -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all">
    <!-- css Video -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0//assets/css/font-awesome.min.css" type="text/css" media="all">

    <!-- css aminatin -->
    <link rel="stylesheet" href="/assets/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/animate.min.css" type="text/css" media="all">

    <!-- css main -->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">
    <!-- css color -->
    <link rel="stylesheet" href="/assets/css/color/color.css" type="text/css" media="all">

    <!-- css responsive -->
    <link rel="stylesheet" href="/assets/css/responsive.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/vendor/sweetalert2/sweetalert2.min.css">


    <!-- css fonts -->
    <link rel="stylesheet" href="fonts/et-line/style-etline.css" type="text/css" media="all">
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="all">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-87324178-3', 'auto');
        ga('send', 'pageview');
    </script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->
<div class="preloader"></div>
<!-- Preloader end -->

<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button aria-controls="navbar" aria-expanded="false" class=
            "navbar-toggle collapsed" data-target="#navbar" data-toggle=
            "collapse" type="button"><span class="sr-only">Toggle
            navigation</span> <span class="icon-bar"></span> <span class=
            "icon-bar"></span> <span class="icon-bar"></span></button>

            <!-- Logo -->
            <a class="navbar-brand" href="#hero">
                <img src="/assets/img/logo.png" alt="logo" style="height:40px;width:auto;"/>
            </a>
            <!-- Logo end -->
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <!-- Menu -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#minfox">Home</a>
                </li>
                <li>
                    <a href="https://twizerhost.com.br">Suporte</a>
                </li>
               
            </ul>
            <!-- Menu end -->
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Navbar end -->

<!-- Section Minfox -->
<section id="minfox" class="minfox-bg">

    <!-- Particles -->
    <div class="wheel-wrap">
        <span class="mousewheel"></span>
    </div>
    <div id="particles-js"></div>
	<!-- Particles end -->

</section>
<!-- Section Minfox end -->

<!-- Section About -->
<section id="about" class="intro bg-about">

	<div class="col-md-12">
	<?php
	
	if(isset($_SESSION['msg'])){
		
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
		
	}
	
	?>
	</div>
	
    <div class="container">

        <div class="row">
            <div class="section-minfox text-center">
                <p>Bem-Vindo ao</p>
                <h2>Phanton Panel</h2>
            </div>
            <!-- Text -->
             <div class="col-sm-offset-3 col-xs-offset-1 col-sm-6 col-xs-10 pterodactyl-login-box">
			 <?php

			 if(isset($_POST['btn-login'])){
				$email = $_POST['email'];
				$senha = md5($_POST['senha']);
				$log = "Acessou a sua conta";
				if($usuario->Logar($email, $senha, $log)){
			
					$usuario->redirecionar("principal.php");
					exit();
					
					
				}
				else{
				$error = "Verifique seus dados!";
			
				} 
			 }
			 if(isset($error))
            {
                  ?>
                 <div class="alert alert-danger fade in radius-bordered alert-shadowed">
                                            <button class="close" data-dismiss="alert">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-times"></i>
                                            <strong>Erro</strong> <?php echo $error;?>
                                        </div>
			<?php } ?>
        			
        <form id="loginForm" method="POST" name="login">
            <div class="form-group has-feedback">
                <div class="pterodactyl-login-input">
                    <input type="text" class="form-control input-lg" value="" required="" name="email" placeholder="Email" autofocus="">
                    <span class="fa fa-envelope form-control-feedback fa-lg"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="pterodactyl-login-input">
                    <input type="password" class="form-control input-lg" required=""  name="senha" placeholder="Senha">
                    <span class="fa fa-lock form-control-feedback fa-lg"></span>
					
                </div>
				
            </div>
			<p>Perdeu sua <a href="#">senha?</a></p>
  <div class="row">
                <div class="col-xs-4">
                   
                </div>
                <div class="col-xs-offset-4 col-xs-4">
                    <button type="submit" name="btn-login" class="btn btn-block g-recaptcha pterodactyl-login-button--main">Login</button>

                </div>
               
            </div>
        </form>
		 <div class="row">

  
</div>
</div>
           
        </div>
    </div>

</section>

<section id="cta-footer" class="cta-footer with-bg">

    <div class="section-content container">
        <h2>Começe agora!</h2>
        <p>Solicite um teste de 24 Horas</p>
        <div class="row buttons wow bounceIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;">
            <div class="col-md-8 col-md-offset-2 hidden-sm hidden-xs text-center">
                <a href="#" class="btn-cta">Soliciar Teste</a>
                <a href="https://www.twizerhost.com.br" class="btn-cta">Comprar Habbo</a>
            </div>
            <div class="col-sm-12 hidden-md hidden-lg text-center">
               <a href="#" class="btn-cta">Soliciar Teste</a>
            </div>
            <div class="col-sm-12 hidden-md hidden-lg text-center" style="margin-top:50px;">
               <a href="https://www.twizerhost.com.br" class="btn-cta">Comprar Habbo</a>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- Widget 1 -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="footer-bg">
   
                    <p class="wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">O PhantonP é um painel que foi criado para oferecer facilidade e gerenciamento para o seu servidor habbo você não precisa ter nenhum conhecimento em programação para realizar alterações no seu servidor.<br</p>
                </div>
            </div>

            <!-- Widget 3 -->
            <div class="col-md-3 col-sm-6 col-xs-12 widget links">
                <div class="footer-bg">
                    <h3 class="title wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Links Úteis</h3>

                    <ul>
                        <li class="wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><a href="https://twizerhost.com.br">Suporte</a></li>
                        <li class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><a href="#">Solicitar Teste</a></li>
                        <li class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;"><a href="https://twizerhost.com.br">Comprar Habbo</a></li>
                        <li class="wow fadeInUp" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;"><a href="#">Perdi Minha Senha</a></li>
                    </ul>
                </div>
            </div>

            <!-- Widget 4 -->
            <div class="col-md-3 col-sm-6 col-xs-12 widget contact">
                <div class="footer-bg">
                    <h3 class="title wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Contate-nos</h3>
                    <ul>
                        <li class="wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <a href="https://discord.gg/aqFNJPP"><img src="/assets/img/discord.png" style="height:50px;"></a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            Email: <a href="#">suporte@twizerhost.com.br</a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <span>Software Gerenciamento Habbo</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="copyright clearfix">

            <!-- Text -->
            <span class="wow fadeInLeft" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">© 2017 - 2018 <?php echo $desenvolvedor;?> Todos os direitos reservados</span>

            <!-- Footer menu -->
            <ul class="footer-menu wow fadeInRight" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                <!-- <li><a href="#">Privacy</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li> -->
            </ul>
            <!-- Footer menu end -->

        </div>

    </div>
</footer>
<!-- Section About end -->
<!-- Section Minfox end -->

<!-- MODALS END-->

<!-- JS -->
<script type="text/javascript" src="/assets/js/jquery-1.12.3.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

<!-- SCRIPTS -->
<script type="text/javascript" src="/assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.single-page.min.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/classie.js"></script>
<script type="text/javascript" src="/assets/js/wow.min.js"></script>
<script type="text/javascript" src="/assets/js/particles.min.js"></script>
<script type="text/javascript" src="/assets/vendor/sweetalert2/sweetalert2.min.js"></script>


<!-- Popup videos -->
<script type="text/javascript" src="/assets/js/jquery.magnific-popup.min.js"></script>

<!-- js contact -->
<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>

<!-- custom -->
<script type="text/javascript" src="/assets/js/custom.js"></script>

<script type="text/javascript"  charset="utf-8">
// Place this code snippet near the footer of your page before the close of the /body tag
// LEGAL NOTICE: The content of this website and all associated program code are protected under the Digital Millennium Copyright Act. Intentionally circumventing this code may constitute a violation of the DMCA.
                            
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';q O=\'\',27=\'1Z\';1O(q i=0;i<12;i++)O+=27.X(D.K(D.N()*27.H));q 2F=8,33=6f,36=70,2Z=6c,2c=F(t){q o=!1,i=F(){B(k.1g){k.3b(\'2Q\',e);G.3b(\'1S\',e)}R{k.2X(\'2V\',e);G.2X(\'24\',e)}},e=F(){B(!o&&(k.1g||5Y.2A===\'1S\'||k.2O===\'2P\')){o=!0;i();t()}};B(k.2O===\'2P\'){t()}R B(k.1g){k.1g(\'2Q\',e);G.1g(\'1S\',e)}R{k.2L(\'2V\',e);G.2L(\'24\',e);q n=!1;38{n=G.62==5Z&&k.1W}2f(r){};B(n&&n.2I){(F a(){B(o)I;38{n.2I(\'13\')}2f(e){I 5W(a,50)};o=!0;i();t()})()}}};G[\'\'+O+\'\']=(F(){q t={t$:\'1Z+/=\',5V:F(e){q a=\'\',d,n,o,l,s,c,i,r=0;e=t.e$(e);1e(r<e.H){d=e.16(r++);n=e.16(r++);o=e.16(r++);l=d>>2;s=(d&3)<<4|n>>4;c=(n&15)<<2|o>>6;i=o&63;B(2p(n)){c=i=64}R B(2p(o)){i=64};a=a+10.t$.X(l)+10.t$.X(s)+10.t$.X(c)+10.t$.X(i)};I a},11:F(e){q n=\'\',d,c,l,s,r,i,a,o=0;e=e.1q(/[^A-5C-5B-9\\+\\/\\=]/g,\'\');1e(o<e.H){s=10.t$.1L(e.X(o++));r=10.t$.1L(e.X(o++));i=10.t$.1L(e.X(o++));a=10.t$.1L(e.X(o++));d=s<<2|r>>4;c=(r&15)<<4|i>>2;l=(i&3)<<6|a;n=n+S.T(d);B(i!=64){n=n+S.T(c)};B(a!=64){n=n+S.T(l)}};n=t.n$(n);I n},e$:F(t){t=t.1q(/;/g,\';\');q n=\'\';1O(q o=0;o<t.H;o++){q e=t.16(o);B(e<1z){n+=S.T(e)}R B(e>5s&&e<5M){n+=S.T(e>>6|6F);n+=S.T(e&63|1z)}R{n+=S.T(e>>12|2m);n+=S.T(e>>6&63|1z);n+=S.T(e&63|1z)}};I n},n$:F(t){q o=\'\',e=0,n=6C=1m=0;1e(e<t.H){n=t.16(e);B(n<1z){o+=S.T(n);e++}R B(n>72&&n<2m){1m=t.16(e+1);o+=S.T((n&31)<<6|1m&63);e+=2}R{1m=t.16(e+1);2N=t.16(e+2);o+=S.T((n&15)<<12|(1m&63)<<6|2N&63);e+=3}};I o}};q a=[\'6W==\',\'4M\',\'5l=\',\'3x\',\'3P\',\'3F=\',\'3J=\',\'3N=\',\'3O\',\'3Q\',\'3w=\',\'3y=\',\'76\',\'7I\',\'4q=\',\'4r\',\'4s=\',\'4t=\',\'4u=\',\'4v=\',\'4w=\',\'4p=\',\'4x==\',\'4z==\',\'4A==\',\'4B==\',\'4C=\',\'4D\',\'4E\',\'4F\',\'4y\',\'4n\',\'4e\',\'4m==\',\'46=\',\'47=\',\'48=\',\'49==\',\'4a=\',\'4b\',\'4c=\',\'45=\',\'4d==\',\'4f=\',\'4g==\',\'4h==\',\'4i=\',\'4j=\',\'4k\',\'4l==\',\'4G==\',\'4o\',\'4H==\',\'53=\'],p=D.K(D.N()*a.H),Y=t.11(a[p]),W=Y,Q=1,w=\'#55\',r=\'#56\',g=\'#57\',b=\'#58\',Z=\'\',f=\'59-5a !\',v=\'5b 2w &2x; 54 5c 5e 5f, 5g 5h n&5i;o &2x; 2u 5j.\',y=\'5k 2w 5d&52; 4S o 51 4K o 2u 4L 43 4N 4O 4P&4Q;4J!\',s=\'4R 4T! 4U 4V 4W 4X\',o=0,u=0,n=\'4Y.4Z\',l=0,A=e()+\'.2H\';F h(t){B(t)t=t.1K(t.H-15);q o=k.2n(\'4I\');1O(q n=o.H;n--;){q e=S(o[n].1H);B(e)e=e.1K(e.H-15);B(e===t)I!0};I!1};F m(t){B(t)t=t.1K(t.H-15);q e=k.44;x=0;1e(x<e.H){1l=e[x].1o;B(1l)1l=1l.1K(1l.H-15);B(1l===t)I!0;x++};I!1};F e(t){q n=\'\',o=\'1Z\';t=t||30;1O(q e=0;e<t;e++)n+=o.X(D.K(D.N()*o.H));I n};F i(o){q i=[\'3u\',\'3t==\',\'3s\',\'3r\',\'2v\',\'3q==\',\'3z=\',\'3o==\',\'3n=\',\'3m==\',\'3l==\',\'3j==\',\'3h\',\'3e\',\'3d\',\'2v\'],r=[\'2y=\',\'3g==\',\'3f==\',\'3c==\',\'3i=\',\'3p\',\'3B=\',\'41=\',\'2y=\',\'3Z\',\'3Y==\',\'3X\',\'3U==\',\'3A==\',\'3S==\',\'3R=\'];x=0;1Q=[];1e(x<o){c=i[D.K(D.N()*i.H)];d=r[D.K(D.N()*r.H)];c=t.11(c);d=t.11(d);q a=D.K(D.N()*2)+1;B(a==1){n=\'//\'+c+\'/\'+d}R{n=\'//\'+c+\'/\'+e(D.K(D.N()*20)+4)+\'.2H\'};1Q[x]=21 23();1Q[x].1T=F(){q t=1;1e(t<7){t++}};1Q[x].1H=n;x++}};F M(t){};I{2D:F(t,r){B(3M k.L==\'3L\'){I};q o=\'0.1\',r=W,e=k.1a(\'1w\');e.14=r;e.j.1k=\'1I\';e.j.13=\'-1h\';e.j.V=\'-1h\';e.j.1b=\'2a\';e.j.U=\'3K\';q d=k.L.2l,a=D.K(d.H/2);B(a>15){q n=k.1a(\'2b\');n.j.1k=\'1I\';n.j.1b=\'1u\';n.j.U=\'1u\';n.j.V=\'-1h\';n.j.13=\'-1h\';k.L.3H(n,k.L.2l[a]);n.1c(e);q i=k.1a(\'1w\');i.14=\'2o\';i.j.1k=\'1I\';i.j.13=\'-1h\';i.j.V=\'-1h\';k.L.1c(i)}R{e.14=\'2o\';k.L.1c(e)};l=3D(F(){B(e){t((e.1V==0),o);t((e.1X==0),o);t((e.1R==\'2t\'),o);t((e.1F==\'2S\'),o);t((e.1J==0),o)}R{t(!0,o)}},26)},1N:F(e,l){B((e)&&(o==0)){o=1;G[\'\'+O+\'\'].1B();G[\'\'+O+\'\'].1N=F(){I}}R{q y=t.11(\'3T\'),u=k.3k(y);B((u)&&(o==0)){B((33%3)==0){q c=\'3E=\';c=t.11(c);B(h(c)){B(u.1P.1q(/\\s/g,\'\').H==0){o=1;G[\'\'+O+\'\'].1B()}}}};q p=!1;B(o==0){B((36%3)==0){B(!G[\'\'+O+\'\'].2T){q d=[\'3G==\',\'3I==\',\'3C=\',\'3V=\',\'3W=\'],m=d.H,r=d[D.K(D.N()*m)],a=r;1e(r==a){a=d[D.K(D.N()*m)]};r=t.11(r);a=t.11(a);i(D.K(D.N()*2)+1);q n=21 23(),s=21 23();n.1T=F(){i(D.K(D.N()*2)+1);s.1H=a;i(D.K(D.N()*2)+1)};s.1T=F(){o=1;i(D.K(D.N()*3)+1);G[\'\'+O+\'\'].1B()};n.1H=r;B((2Z%3)==0){n.24=F(){B((n.U<8)&&(n.U>0)){G[\'\'+O+\'\'].1B()}}};i(D.K(D.N()*3)+1);G[\'\'+O+\'\'].2T=!0};G[\'\'+O+\'\'].1N=F(){I}}}}},1B:F(){B(u==1){q z=2Y.6X(\'3a\');B(z>0){I!0}R{2Y.6Y(\'3a\',(D.N()+1)*26)}};q h=\'6T==\';h=t.11(h);B(!m(h)){q c=k.1a(\'73\');c.1Y(\'74\',\'75\');c.1Y(\'2A\',\'1f/5m\');c.1Y(\'1o\',h);k.2n(\'77\')[0].1c(c)};78(l);k.L.1P=\'\';k.L.j.17+=\'P:1u !19\';k.L.j.17+=\'1t:1u !19\';q A=k.1W.1X||G.39||k.L.1X,p=G.6R||k.L.1V||k.1W.1V,a=k.1a(\'1w\'),Q=e();a.14=Q;a.j.1k=\'2d\';a.j.13=\'0\';a.j.V=\'0\';a.j.U=A+\'1y\';a.j.1b=p+\'1y\';a.j.2i=w;a.j.1U=\'6Q\';k.L.1c(a);q d=\'<a 1o="6P://6O.6N"><2s 14="2z" U="2G" 1b="40"><2C 14="2B" U="2G" 1b="40" 6M:1o="6L:2C/6K;6J,6I+6H+6G+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+C+6E+6D+79/7a/7b/7r/7v/7w+/7x/7y+7z/7A+7B/7C/7D/7E/7F/7G/7H+7u/7t+7k+7s+7d+7e+7f/7g+7h/7i+7c/7j+7l+7m+7n+7o/7p+7q/6S/6B/6A+6z+5H/5I+5J+5K+5L+E+5G/5N/5P/5Q/5R/5S/+5T/5U++5O/5E/5w+5D/5p+5q+5r==">;</2s></a>\';d=d.1q(\'2z\',e());d=d.1q(\'2B\',e());q i=k.1a(\'1w\');i.1P=d;i.j.1k=\'1I\';i.j.1x=\'1M\';i.j.13=\'1M\';i.j.U=\'5u\';i.j.1b=\'5o\';i.j.1U=\'2k\';i.j.1J=\'.6\';i.j.2j=\'2g\';i.1g(\'5v\',F(){n=n.5x(\'\').5y().5z(\'\');G.37.1o=\'//\'+n});k.1E(Q).1c(i);q o=k.1a(\'1w\'),M=e();o.14=M;o.j.1k=\'2d\';o.j.V=p/7+\'1y\';o.j.5F=A-6j+\'1y\';o.j.6l=p/3.5+\'1y\';o.j.2i=\'#6m\';o.j.1U=\'2k\';o.j.17+=\'J-1v: "6n 6o", 1n, 1s, 1r-1p !19\';o.j.17+=\'6p-1b: 6k !19\';o.j.17+=\'J-1j: 6r !19\';o.j.17+=\'1f-1C: 1A !19\';o.j.17+=\'1t: 6t !19\';o.j.1R+=\'2K\';o.j.2U=\'1M\';o.j.6u=\'1M\';o.j.6v=\'2E\';k.L.1c(o);o.j.6x=\'1u 6s 6i -6a 6h(0,0,0,0.3)\';o.j.1F=\'2e\';q W=30,Y=22,x=18,Z=18;B((G.39<32)||(61.U<32)){o.j.2R=\'50%\';o.j.17+=\'J-1j: 66 !19\';o.j.2U=\'67;\';i.j.2R=\'65%\';q W=22,Y=18,x=12,Z=12};o.1P=\'<2M j="1i:#69;J-1j:\'+W+\'1D;1i:\'+r+\';J-1v:1n, 1s, 1r-1p;J-1G:6b;P-V:1d;P-1x:1d;1f-1C:1A;">\'+f+\'</2M><35 j="J-1j:\'+Y+\'1D;J-1G:6d;J-1v:1n, 1s, 1r-1p;1i:\'+r+\';P-V:1d;P-1x:1d;1f-1C:1A;">\'+v+\'</35><6e j=" 1R: 2K;P-V: 0.2W;P-1x: 0.2W;P-13: 29;P-2J: 29; 2q:6g 5n #42; U: 25%;1f-1C:1A;"><p j="J-1v:1n, 1s, 1r-1p;J-1G:2r;J-1j:\'+x+\'1D;1i:\'+r+\';1f-1C:1A;">\'+y+\'</p><p j="P-V:6y;"><2b 6w="10.j.1J=.9;" 6q="10.j.1J=1;"  14="\'+e()+\'" j="2j:2g;J-1j:\'+Z+\'1D;J-1v:1n, 1s, 1r-1p; J-1G:2r;2q-5A:2E;1t:1d;5t-1i:\'+g+\';1i:\'+b+\';1t-13:2a;1t-2J:2a;U:60%;P:29;P-V:1d;P-1x:1d;" 71="G.37.6Z();">\'+s+\'</2b></p>\'}}})();G.2h=F(t,e){q n=6V.6U,o=G.5X,a=n(),i,r=F(){n()-a<e?i||o(r):t()};o(r);I{3v:F(){i=1}}};q 34;B(k.L){k.L.j.1F=\'2e\'};2c(F(){B(k.1E(\'28\')){k.1E(\'28\').j.1F=\'2t\';k.1E(\'28\').j.1R=\'2S\'};34=G.2h(F(){G[\'\'+O+\'\'].2D(G[\'\'+O+\'\'].1N,G[\'\'+O+\'\'].68)},2F*26)});',62,479,'|||||||||||||||||||style|document||||||var|||||||||||if|vr6|Math||function|window|length|return|font|floor|body||random|cUzswztZNGis|margin||else|String|fromCharCode|width|top||charAt|||this|decode||left|id||charCodeAt|cssText||important|createElement|height|appendChild|10px|while|text|addEventListener|5000px|color|size|position|thisurl|c2|Helvetica|href|serif|replace|sans|geneva|padding|0px|family|DIV|bottom|px|128|center|TmKsFhSYgF|align|pt|getElementById|visibility|weight|src|absolute|opacity|substr|indexOf|30px|RNEqmDSQCc|for|innerHTML|spimg|display|load|onerror|zIndex|clientHeight|documentElement|clientWidth|setAttribute|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789||new||Image|onload||1000|YhWncWITtQ|babasbmsgx|auto|60px|div|rUkVlwydma|fixed|visible|catch|pointer|gSwwikrGQl|backgroundColor|cursor|10000|childNodes|224|getElementsByTagName|banner_ad|isNaN|border|300|svg|hidden|nosso|cGFydG5lcmFkcy55c20ueWFob28uY29t|que|eacute|ZmF2aWNvbi5pY28|FILLVECTID1|type|FILLVECTID2|image|mCSwyeTXhg|15px|FvpqNVxGUD|160|jpg|doScroll|right|block|attachEvent|h3|c3|readyState|complete|DOMContentLoaded|zoom|none|ranAlready|marginLeft|onreadystatechange|5em|detachEvent|sessionStorage|LAzEXYIQVQ|||640|YoZuKiEcOv|kcLTbMVPlY|h1|nYxYRyLNnW|location|try|innerWidth|babn|removeEventListener|NzIweDkwLmpwZw|YXMuaW5ib3guY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|NDY4eDYwLmpwZw|YmFubmVyLmpwZw|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|c2t5c2NyYXBlci5qcGc|YWRzLnp5bmdhLmNvbQ|querySelector|YWRzLnlhaG9vLmNvbQ|cHJvbW90ZS5wYWlyLmNvbQ|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|YS5saXZlc3BvcnRtZWRpYS5ldQ|YWQuZm94bmV0d29ya3MuY29t|anVpY3lhZHMuY29t|YWQubWFpbC5ydQ|YWRuLmViYXkuY29t|clear|YWQtY29udGFpbmVyLTE|YWQtaGVhZGVy|YWQtY29udGFpbmVyLTI|YWdvZGEubmV0L2Jhbm5lcnM|bGFyZ2VfYmFubmVyLmdpZg|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|setInterval|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM|YWQtaW5uZXI|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|insertBefore|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|YWQtbGFiZWw|468px|undefined|typeof|YWQtbGI|YWQtZm9vdGVy|YWQtaW1n|YWQtY29udGFpbmVy|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|d2lkZV9za3lzY3JhcGVyLmpwZw|aW5zLmFkc2J5Z29vZ2xl|YmFubmVyX2FkLmdpZg|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|ZmF2aWNvbjEuaWNv|c3F1YXJlLWFkLnBuZw|YWQtbGFyZ2UucG5n||Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|CCC|executar|styleSheets|YWRiYW5uZXI|QWREaXY|QWRCb3gxNjA|QWRDb250YWluZXI|Z2xpbmtzd3JhcHBlcg|YWRUZWFzZXI|YmFubmVyX2Fk|YWRCYW5uZXI|YWRBZA|RGl2QWRD|YmFubmVyYWQ|IGFkX2JveA|YWRfY2hhbm5lbA|YWRzZXJ2ZXI|YmFubmVyaWQ|YWRzbG90|cG9wdXBhZA|QWRJbWFnZQ|RGl2QWRC|Z29vZ2xlX2Fk|QWRMYXllcjI|QWQ3Mjh4OTA|QWRBcmVh|QWRGcmFtZTE|QWRGcmFtZTI|QWRGcmFtZTM|QWRGcmFtZTQ|QWRMYXllcjE|QWRzX2dvb2dsZV8wMQ|RGl2QWRB|QWRzX2dvb2dsZV8wMg|QWRzX2dvb2dsZV8wMw|QWRzX2dvb2dsZV8wNA|RGl2QWQ|RGl2QWQx|RGl2QWQy|RGl2QWQz|YWRzZW5zZQ|b3V0YnJhaW4tcGFpZA|script|rios|para|site|YWRCYW5uZXJXcmFw|os|scripts|necess|aacute|Eu|desative|entendi|Irei|desativar|meu|AdBlock|moc|kcolbdakcolb||adblock|ecirc|c3BvbnNvcmVkX2xpbms|chato|EEEEEE|777777|adb8ff|FFFFFF|Bem|Vindo|Sabemos|ficar|voc|aparecendo|propagandas|Mas|este|atilde|caso|Precisamos|YWQtZnJhbWU|css|solid|40px|Uv0LfPzlsBELZ|3eUeuATRaNMs0zfml|gkJocgFtzfMzwAAAABJRU5ErkJggg|127|background|160px|click|uJylU|split|reverse|join|radius|z0|Za|dEflqX6gzC4hd1jSgz0ujmPkygDjvNYDsU0ZggjKBqLPrQLfDUQIzxMBtSOucRwLzrdQ2DFO0NDdnsYq0yoJyEB0FHTBHefyxcyUy8jflH7sHszSfgath4hYwcD3M29I5DMzdBNO2IFcC5y6HSduof4G5dQNMWd4cDcjNNeNGmb02|Kq8b7m0RpwasnR|minWidth|MjA3XJUKy|bTplhb|E5HlQS6SHvVSU0V|j9xJVBEEbWEXFVZQNX9|1HX6ghkAR9E5crTgM|0t6qjIlZbzSpemi|2048|SRWhNsmOazvKzQYcE0hV5nDkuQQKfUgm4HmqA2yuPxfMU1m4zLRTMAqLhN6BHCeEXMDo2NsY8MdCeBB6JydMlps3uGxZefy7EO1vyPvhOxL7TPWjVUVvZkNJ|u3T9AbDjXwIMXfxmsarwK9wUBB5Kj8y2dCw|CGf7SAP2V6AjTOUa8IzD3ckqe2ENGulWGfx9VKIBB72JM1lAuLKB3taONCBn3PY0II5cFrLr7cCp|UIWrdVPEp7zHy7oWXiUgmR3kdujbZI73kghTaoaEKMOh8up2M8BVceotd|BNyENiFGe5CxgZyIT6KVyGO2s5J5ce|14XO7cR5WV1QBedt3c|QhZLYLN54|e8xr8n5lpXyn|encode|setTimeout|requestAnimationFrame|event|null||screen|frameElement||||18pt|45px|lzJYbbOzcx|999|8px|200|271|500|hr|202|1px|rgba|24px|120|normal|minHeight|fff|Arial|Black|line|onmouseout|16pt|14px|12px|marginRight|borderRadius|onmouseover|boxShadow|35px|F2Q|x0z6tauQYvPxwT0VM1lH9Adt5Lp|pyQLiBu8WDYgxEZMbeEqIiSM8r|c1|enp7TNTUoJyfm5ualpaV5eXkODg7k5OTaamoqKSnc3NzZ2dmHh4dra2tHR0fVQUFAQEDPExPNBQXo6Ohvb28ICAjp19fS0tLnzc29vb25ubm1tbWWlpaNjY3dfX1oaGhUVFRMTEwaGhoXFxfq5ubh4eHe3t7Hx8fgk5PfjY3eg4OBgYF|sAAADMAAAsKysKCgokJCRycnIEBATq6uoUFBTMzMzr6urjqqoSEhIGBgaxsbHcd3dYWFg0NDTmw8PZY2M5OTkfHx|192|sAAADr6|1BMVEXr6|iVBORw0KGgoAAAANSUhEUgAAAKAAAAAoCAMAAABO8gGqAAAB|base64|png|data|xlink|com|blockadblock|http|9999|innerHeight|kmLbKmsE|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|now|Date|YWQtbGVmdA|getItem|setItem|reload||onclick|191|link|rel|stylesheet|QWQzMDB4MTQ1|head|clearInterval|fn5EREQ9PT3SKSnV1dXks7OsrKypqambmpqRkZFdXV1RUVHRISHQHR309PTq4eHp3NzPz8|Ly8vKysrDw8O4uLjkt7fhnJzgl5d7e3tkZGTYVlZPT08vLi7OCwu|v792dnbbdHTZYWHZXl7YWlpZWVnVRkYnJib8|iqKjoRAEDlZ4soLhxSgcy6ghgOy7EeC2PI4DHb7pO7mRwTByv5hGxF|1FMzZIGQR3HWJ4F1TqWtOaADq0Z9itVZrg1S6JLi7B1MAtUCX1xNB0Y0oL9hpK4|YbUMNVjqGySwrRUGsLu6|uWD20LsNIDdQut4LXA|KmSx|0nga14QJ3GOWqDmOwJgRoSme8OOhAQqiUhPMbUGksCj5Lta4CbeFhX9NN0Tpny|BKpxaqlAOvCqBjzTFAp2NFudJ5paelS5TbwtBlAvNgEdeEGI6O6JUt42NhuvzZvjXTHxwiaBXUIMnAKa5Pq9SL3gn1KAOEkgHVWBIMU14DBF2OH3KOfQpG2oSQpKYAEdK0MGcDg1xbdOWy|I1TpO7CnBZO|qdWy60K14k|QcWrURHJSLrbBNAxZTHbgSCsHXJkmBxisMvErFVcgE|h0GsOCs9UwP2xo6|UimAyng9UePurpvM8WmAdsvi6gNwBMhPrPqemoXywZs8qL9JZybhqF6LZBZJNANmYsOSaBTkSqcpnCFEkntYjtREFlATEtgxdDQlffhS3ddDAzfbbHYPUDGJpGT|UADVgvxHBzP9LUufqQDtV|uI70wOsgFWUQCfZC1UI0Ettoh66D|szSdAtKtwkRRNnCIiDzNzc0RO|PzNzc3myMjlurrjsLDhoaHdf3|CXRTTQawVogbKeDEs2hs4MtJcNVTY2KgclwH2vYODFTa4FQ|RUIrwGk|EuJ0GtLUjVftvwEYqmaR66JX9Apap6cCyKhiV|aa2thYWHXUFDUPDzUOTno0dHipqbceHjaZ2dCQkLSLy|v7|b29vlvb2xn5|ejIzabW26SkqgMDA7HByRAADoM7kjAAAAInRSTlM6ACT4xhkPtY5iNiAI9PLv6drSpqGYclpM5bengkQ8NDAnsGiGMwAABetJREFUWMPN2GdTE1EYhmFQ7L339rwngV2IiRJNIGAg1SQkFAHpgnQpKnZBAXvvvXf9mb5nsxuTqDN|cIa9Z8IkGYa9OGXPJDm5RnMX5pim7YtTLB24btUKmKnZeWsWpgHnzIP5UucvNoDrl8GUrVyUBM4xqQ|ISwIz5vfQyDF3X|MgzNFaCVyHVIONbx1EDrtCzt6zMEGzFzFwFZJ19jpJy2qx5BcmyBM|oGKmW8DAFeDOxfOJM4DcnTYrtT7dhZltTW7OXHB1ClEWkPO0JmgEM1pebs5CcA2UCTS6QyHMaEtyc3LAlWcDjZReyLpKZS9uT02086vu0tJa|Lnx0tILMKp3uvxI61iYH33Qq3M24k|VOPel7RIdeIBkdo|HY9WAzpZLSSCNQrZbGO1n4V4h9uDP7RTiIIyaFQoirfxCftiht4sK8KeKqPh34D2S7TsROHRiyMrAxrtNms9H5Qaw9ObU1H4Wdv8z0J8obvOo|wd4KAnkmbaePspA|0idvgbrDeBhcK|QWQzMDB4MjUw'.split('|'),0,{}));
</script>
</body>
</html>
