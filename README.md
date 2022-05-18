<h1>BackEnd</h1>
<h3>Per avviare il webServer dockerizzato utilizza il seguente comando:</h3>
<p>docker run -d -p 8080:80 --name my-apache-php-app --rm  -v PercorsoCartellaServer:/var/www/html zener79/php:7.4-apache</p>
<h3>Per avviare il MySQL Server e importare di dati del dump utilizza il seguente comando:</h3>
<p>docker run --name my-mysql-server --rm -v PercorsoCartellaMySQL:/var/lib/mysql -v PercorsoCartellaDump:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest</p>
<h4>ottenere una bash dantro il container al fine di importare il dump:</h4>
<p>docker exec -it my-mysql-server bash</p>
<h4>importare il dump:</h4>
<p>mysql -u root -p < /dump/create_employee.sql; exit;</p>
<h3>Le volte successive sarà sufficiente avviare il container con Mysql tramite il seguente comando:</h3>
<p>docker run --name my-mysql-server --rm -v PercorsoCartellaMySQL:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest</p>
