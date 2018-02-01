-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 09:59 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisae`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PaAsigmateriaTb19_Asignar` (IN `idm` VARCHAR(20), IN `idp` VARCHAR(20))  BEGIN
insert into asigmateriatb19(VcMateriaTb17_IdMateria,VcProfTb04_IdProfesor) values(idm,idp);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaAsigmateriaTb19_Profe_Materia` (IN `idprof` VARCHAR(20))  NO SQL
begin
select materiatb17.VcMateriaTb17_IdMateria as 'Id_Materia', materiatb17.VcMateriaTb17_Nombre as 'nombre' 
from materiatb17 inner join asigmateriatb19 on materiatb17.VcMateriaTb17_IdMateria = asigmateriatb19.VcMateriaTb17_IdMateria where 
asigmateriatb19.VcProfTb04_IdProfesor = idprof;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_ActualizarEnc` (IN `IdEnc` VARCHAR(20), IN `NomEnc` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Telefono` VARCHAR(8), IN `Email` VARCHAR(100))  begin
	update enctb05,usutb01
    set usutb01.VcUsuTb01_Nombre = NomEnc, usutb01.VcUsuTb01_Ape1 = Ape1, usutb01.VcusuTb01_Ape2 = Ape2,
    usutb01.VcUsutb01_Direccion = Direccion, usutb01.VcUsuTb01_Telefono = Telefono,
	usutb01.VcUsuTb01_Email = Email
    where enctb05.VcEncTb05_IdEncargado = IdEnc  and usutb01.VcUsuTb01_Cedula=IdEnc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_BuscarEnc` (IN `cedula` VARCHAR(20))  begin
	select u.VcUsuTb01_Cedula as 'Cedula', u.VcUsuTb01_Nombre as 'Nombre', u.VcUsuTb01_Ape1 as 'Apellido1',
    u.VcUsuTb01_Ape2 as 'Apellido2', u.VcUsuTb01_Direccion as 'Direccion', u.CrUsuTb01_Sexo as 'Genero',
    u.VcUsuTb01_Telefono as 'Telefono', u.VcUsuTb01_Email as 'Email', e.VcEncTb05_Clave as 'Clave'
    from EncTb05 as e inner join usutb01 as u on e.VcEncTb05_IdEncargado = u.VcUsuTb01_Cedula
  where e.VcEncTb05_IdEncargado = cedula;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_BuscarEncD` (IN `dato` VARCHAR(20))  begin
	select u.VcUsuTb01_Cedula as 'Cedula', u.VcUsuTb01_Nombre as 'Nombre', u.VcUsuTb01_Ape1 as 'Apellido1',
    u.VcUsuTb01_Ape2 as 'Apellido2', u.VcUsuTb01_Direccion as 'Direccion', u.CrUsuTb01_Sexo as 'Genero',
    u.VcUsuTb01_Telefono as 'Telefono', u.VcUsuTb01_Email as 'Email', e.VcEncTb05_Clave as 'Clave'
    from EncTb05 as e inner join usutb01 as u on e.VcEncTb05_IdEncargado = u.VcUsuTb01_Cedula
  where e.VcEncTb05_IdEncargado like concat('%',dato,'%') 
  or u.VcUsuTb01_Nombre like concat('%',dato,'%') 
  or u.VcUsuTb01_Ape1 like concat('%',dato,'%')
  or u.VcUsuTb01_Ape2 like concat('%',dato,'%') 
  or u.VcUsuTb01_Direccion like concat('%',dato,'%') 
  or u.CrUsuTb01_Sexo like concat(dato,'%')
  or u.VcUsuTb01_Email like concat('%',dato,'%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_EliminarEnc` (IN `id` VARCHAR(20))  begin
	delete from enctb05 where VcEncTb05_IdEncargado = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_GuardarEnc` (IN `IdEnc` VARCHAR(20), IN `NomEnc` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Sexo` CHAR(1), IN `Telefono` VARCHAR(8), IN `Email` VARCHAR(100), IN `Clave` VARCHAR(20))  begin
	insert into UsuTb01(VcUsuTb01_Cedula, VcUsuTb01_Nombre, VcUsuTb01_Ape1, VcUsuTb01_Ape2, VcUsuTb01_Direccion, CrUsuTb01_Sexo, VcUsuTb01_Telefono, VcUsuTb01_Email)
    values(IdEnc, NomEnc, Ape1, Ape2, Direccion, Sexo, Telefono, Email);
	insert into EncTb05(VcEncTb05_IdEncargado, VcEncTb05_Clave)
    values (IdEnc, Clave);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEncTb05_Listar` (IN `inicio` INT, IN `fin` INT)  begin
 select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2', UsuTb01.VcUsuTb01_Direccion as 'Direccion', UsuTb01.CrUsuTb01_Sexo as 'Genero', 
 UsuTb01.VcUsuTb01_Telefono as 'Telefono', UsuTb01.VcUsuTb01_Email as 'Email', 
 enctb05.Vcenctb05_IdEncargado as 'Id Encargado', enctb05.Vcenctb05_Clave as 'Clave'
    from UsuTb01, enctb05
    where enctb05.VcEncTb05_IdEncargado = UsuTb01.VcUsuTb01_Cedula
	order by 'date added' limit inicio,fin;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEspecialidadTb16_ActualizarEspecialidad` (IN `IdEsp` VARCHAR(20), IN `NomEsp` VARCHAR(20), IN `Cupo` INT)  begin
	update EspecialidadTb16
    set   especialidadtb16.VcEspecialidadTb16_Nombre = NomEsp, especialidadtb16.InEspecialidadTb16_Cupo = Cupo
    where especialidadtb16.VcEspecialidadTb16_IdEspecialidad = IdEsp;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEspecialidadTb16_BuscarEspecialidad` (IN `IdEsp` VARCHAR(20))  begin
	select * from EspecialidadTb16
     where VcEspecialidadTb16_IdEspecialidad = IdEsp;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEspecialidadTb16_GuardarEspecialidad` (IN `IdEsp` VARCHAR(20), IN `NomEsp` VARCHAR(20), IN `Cupo` INT)  begin
	insert into EspecialidadTb16 (VcEspecialidadTb16_IdEspecialidad, VcEspecialidadTb16_Nombre, InEspecialidadTb16_Cupo)
    values (IdEsp, NomEsp, Cupo);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEspecialidadTb16_Listar` ()  begin
	select VcEspecialidadTb16_IdEspecialidad as 'Id', VcEspecialidadTb16_Nombre as 'Nombre',InEspecialidadTb16_Cupo  as 'Cupo' 
    from especialidadtb16
	order by especialidadtb16.VcEspecialidadTb16_IdEspecialidad;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstEncTb07_ActualizarEstEnc` (IN `IdEnc` VARCHAR(20), IN `IdEst` VARCHAR(20))  begin
	update EstEncTb07
    set IdEnc = VcEstEncTb07_IdEncargado, IdEst = VcEstEncTb07_IdEstudiante
    where IdEnc = VcEstEncTb07_IdEncargado;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEsttb03_ActualizarEst` (IN `cedula` VARCHAR(20), IN `FechaNac` DATE, IN `Nombre` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Telefono` VARCHAR(20), IN `email` VARCHAR(20))  BEGIN
update esttb03,usutb01 set esttb03.DtEstTb03_FechaNac = FechaNac,usutb01.VcUsuTb01_Nombre = Nombre,usutb01.VcUsuTb01_Ape1 = Ape1,usutb01.VcUsuTb01_Ape2 = Ape2,usutb01.VcUsuTb01_Direccion = Direccion,usutb01.VcUsuTb01_Telefono = Telefono,usutb01.VcUsuTb01_Email = email
where usutb01.VcUsuTb01_Cedula = cedula and esttb03.VcEstTb03_IdEstudiante = cedula;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstTb03_BorrarEst` (IN `IdEst` VARCHAR(20))  begin
update esttb03 set VcEstTb03_Estado = 'I' where VcEstTb03_IdEstudiante = IdEst;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstTb03_BuscarEst` (IN `cedula` VARCHAR(20))  begin
	select u.VcUsuTb01_Cedula as 'Cedula', u.VcUsuTb01_Nombre as 'Nombre', u.VcUsuTb01_Ape1 as 'Apellido1',
    u.VcUsuTb01_Ape2 as 'Apellido2', u.VcUsuTb01_Direccion as 'Direccion', u.CrUsuTb01_Sexo as 'Genero',
    u.VcUsuTb01_Telefono as 'Telefono', u.VcUsuTb01_Email as 'Email', e.DtEstTb03_FechaNac as 'Fecha_Nac',
	e.VcEstTb03_Adecuacion as 'Adecuacion',
    e.VcEstTb03_Estado as 'Estado', s.VcEspecialidadTb16_Nombre as 'Especialidad'
    from esttb03 as e inner join usutb01 as u on e.VcEstTb03_IdEstudiante = u.VcUsuTb01_Cedula join especialidadtb16 as s on e.VcEspecialidadTb16_IdEspecialidad = s.VcEspecialidadTb16_IdEspecialidad
  where e.VcEstTb03_IdEstudiante = cedula;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstTb03_GuardarEst` (IN `IdEst` VARCHAR(20), IN `FecNacEst` DATE, IN `Adecuacion` VARCHAR(20), IN `Estado` VARCHAR(20), IN `IdEspecialidad` VARCHAR(20), IN `NomEst` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(20), IN `Sexo` CHAR(1), IN `Telefono` VARCHAR(8), IN `Email` VARCHAR(100))  begin
	insert into UsuTb01(VcUsuTb01_Cedula, VcUsuTb01_Nombre, VcUsuTb01_Ape1, VcUsuTb01_Ape2, VcUsuTb01_Direccion, CrUsuTb01_Sexo, VcUsuTb01_Telefono, VcUsuTb01_Email)
    values(IdEst, NomEst, Ape1, Ape2, Direccion, Sexo, Telefono, Email);
     insert into EstTb03 (VcEstTb03_IdEstudiante, DtEstTb03_FechaNac, VcEstTb03_Adecuacion, VcEstTb03_Estado, VcEspecialidadTb16_IdEspecialidad)
    values (IdEst, FecNacEst, Adecuacion, Estado, IdEspecialidad);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstTb03_Listar` (IN `inicio` INT, IN `final` INT)  begin
 select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2', UsuTb01.VcUsuTb01_Direccion as 'Direccion', UsuTb01.CrUsuTb01_Sexo as 'Genero', 
 UsuTb01.VcUsuTb01_Telefono as 'Telefono', UsuTb01.VcUsuTb01_Email as 'Email', EstTb03.DtEstTb03_FechaNac as 'FechaNac', 
 EstTb03.VcEstTb03_Adecuacion as 'Adecuacion', EstTb03.VcEstTb03_Estado as 'Estado', especialidadtb16.VcEspecialidadTb16_Nombre as 'Especialidad'
    from UsuTb01, EstTb03,especialidadtb16
    where EstTb03.VcEstTb03_IdEstudiante = UsuTb01.VcUsuTb01_Cedula and esttb03.VcEspecialidadTb16_IdEspecialidad = especialidadtb16.VcEspecialidadTb16_IdEspecialidad
	order by 'date added' limit inicio,final;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaEstTb03_ListarActivos` ()  begin
 select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2', UsuTb01.VcUsuTb01_Direccion as 'Direccion', UsuTb01.CrUsuTb01_Sexo as 'Genero', 
 UsuTb01.VcUsuTb01_Telefono as 'Telefono', UsuTb01.VcUsuTb01_Email as 'Email', EstTb03.DtEstTb03_FechaNac as 'FechaNac', 
 EstTb03.VcEstTb03_Adecuacion as 'Adecuacion', EstTb03.VcEstTb03_Estado as 'Estado', EspecialidadTb16.VcEspecialidadTb16_Nombre as 'Especialidad'
    from UsuTb01, EstTb03, EspecialidadTb16
    where EstTb03.VcEstTb03_IdEstudiante = UsuTb01.VcUsuTb01_Cedula and esttb03.VcEstTb03_Estado = 'A' and EspecialidadTb16.VcEspecialidadTb16_IdEspecialidad = EstTb03.VcEspecialidadTb16_IdEspecialidad
	order by EstTb03.VcEstTb03_IdEstudiante;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaFunTb06_ActualizarFunc` (IN `IdFun` VARCHAR(20), IN `Clave` VARCHAR(20), IN `NomFun` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `ape2` VARCHAR(20), IN `Direccion` VARCHAR(20), IN `Telefono` VARCHAR(100), IN `Email` VARCHAR(20))  begin
	update FunTb06,usutb01
    set funtb06.VcFunTb06_Clave = Clave, usutb01.VcUsuTb01_Nombre = NomFun, usutb01.VcUsuTb01_Ape1 = Ape1, usutb01.VcusuTb01_Ape2 = Ape2, usutb01.VcUsutb01_Direccion = Direccion, usutb01.VcUsuTb01_Telefono = Telefono, usutb01.VcUsuTb01_Email = Email
	where funtb06.VcFunTb06_IdFuncionario = IdFun and usutb01.VcUsuTb01_Cedula = IdFun;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaFunTb06_Borrar_Func` (IN `cedula` INT)  NO SQL
BEGIN
update funtb06 set VcFunTb06_Estado = 'I' where VcFunTb06_IdFuncionario = cedula;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaFunTb06_Buscar_FuncD` (IN `dato` INT)  begin
select usutb01.VcUsuTb01_Cedula as 'Cedula',usutb01.VcUsuTb01_Nombre as 'Nombre',usutb01.VcUsuTb01_Ape1 as 'Apellido1',usutb01.VcUsuTb01_Ape2 as 'Apellido2',usutb01.VcUsuTb01_Direccion as 'Direccion',usutb01.CrUsuTb01_Sexo as 'Sexo',usutb01.VcUsuTb01_Telefono as 'Telefono',usutb01.VcUsuTb01_Email as 'Email',funtb06.VcFunTb06_Clave as 'Clave',funtb06.DtFunTb06_FechaNac as 'Fecha_Nac',funtb06.VcFunTb06_Estado as 'Estado' from usutb01 inner join funtb06 on usutb01.VcUsuTb01_Cedula = funtb06.VcFunTb06_IdFuncionario where funtb06.VcFunTb06_IdFuncionario like concat('%',dato,'%') 
  or usutb01.VcUsuTb01_Nombre like concat('%',dato,'%') 
  or usutb01.VcUsuTb01_Ape1 like concat('%',dato,'%')
  or usutb01.VcUsuTb01_Ape2 like concat('%',dato,'%') 
  or usutb01.VcUsuTb01_Direccion like concat('%',dato,'%') 
  or usutb01.CrUsuTb01_Sexo like concat(dato,'%')
  or usutb01.VcUsuTb01_Email like concat('%',dato,'%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaFunTb06_GuardarFunc` (IN `IdFun` VARCHAR(20), IN `NomFun` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Sexo` CHAR(1), IN `Telefono` VARCHAR(20), IN `Email` VARCHAR(20), IN `Clave` VARCHAR(20), IN `FechaNac` DATE)  begin
	insert into UsuTb01(VcUsuTb01_Cedula, VcUsuTb01_Nombre, VcUsuTb01_Ape1, VcUsuTb01_Ape2, VcUsuTb01_Direccion, CrUsuTb01_Sexo, VcUsuTb01_Telefono, VcUsuTb01_Email)
    values(IdFun, NomFun, Ape1, Ape2, Direccion, Sexo, Telefono, Email);
    insert into FunTb06 ( VcFunTb06_IdFuncionario,VcFunTb06_Clave, DtFunTb06_FechaNac, VcFunTb06_Estado)
    values (IdFun, Clave, FechaNac, 'A');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaFunTb06_Listar` (IN `inicio` INT, IN `final` INT)  begin
select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2', UsuTb01.VcUsuTb01_Direccion as 'Direccion', UsuTb01.CrUsuTb01_Sexo as 'Genero', 
 UsuTb01.VcUsuTb01_Telefono as 'Telefono', UsuTb01.VcUsuTb01_Email as 'Email', 
 funtb06.VcFunTb06_IdFuncionario as 'Id Funcionario', funtb06.VcFunTb06_Clave as 'Clave', 
 funtb06.DtFunTb06_FechaNac as 'Fecha_Nac', funtb06.VcFunTb06_Estado as 'Estado'
    from UsuTb01, funtb06
    where funtb06.VcFunTb06_IdFuncionario = UsuTb01.VcUsuTb01_Cedula
    and funtb06.VcFunTb06_Estado = 'A'
	order by 'date added' limit inicio,final;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaGradoTb13_Listar` (IN `inicio` INT, IN `final` INT)  NO SQL
BEGIN
select gradotb13.VcGradoTb13_IdGrado as 'id_grado' , gradotb13.VcGradoTb13_NombreGrado as 'Nombre' from gradotb13 order by 'date added' limit inicio,final;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaHorariosTb29_Profe_Mater` (IN `idma` VARCHAR(20))  BEGIN
select usutb01.VcUsuTb01_Cedula as 'Cedula',usutb01.VcUsuTb01_Nombre as 'Nombre',usutb01.VcUsuTb01_Ape1 as 'Apellido1',usutb01.VcUsuTb01_Ape2 as 'Apellido2' from usutb01 inner join proftb04 on usutb01.VcUsuTb01_Cedula = proftb04.VcProfTb04_IdProfesor join asigmateriatb19 on proftb04.VcProfTb04_IdProfesor = asigmateriatb19.VcProfTb04_IdProfesor where asigmateriatb19.VcMateriaTb17_IdMateria = idma order by 'date added';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_ActualizarMateria` (IN `IdMat` VARCHAR(20), IN `NomMat` VARCHAR(20))  begin
	update MateriaTb17
    set   VcMateriaTb17_Nombre = NomMat
    where VcMateriaTb17_IdMateria = IdMat;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_BuscarMateria` (IN `IdMat` VARCHAR(20))  begin
	select VcMateriaTb17_IdMateria as 'Id', VcMateriaTb17_Nombre as 'Nombre' from MateriaTb17
     where VcMateriaTb17_IdMateria = IdMat;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_EliminarMateria` (IN `IdMat` VARCHAR(20))  begin
	delete from MateriaTb17 where materiatb17.VcMateriaTb17_IdMateria = IdMat;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_GuardarMateria` (IN `IdMat` VARCHAR(20), IN `NomMat` VARCHAR(20))  begin
	insert into MateriaTb17 (VcMateriaTb17_IdMateria, VcMateriaTb17_Nombre)
    values (IdMat, NomMat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_Listar` (IN `inicio` INT, IN `final` INT)  begin
select VcMateriaTb17_IdMateria as 'Id',VcMateriaTb17_Nombre as 'Nombre' from materiatb17;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_Listar_Asigna` ()  NO SQL
begin
SELECT usutb01.VcUsuTb01_Cedula as 'Cedula',usutb01.VcUsuTb01_Nombre as 'Nombre',usutb01.VcUsuTb01_Ape1 as 'Apellido1',usutb01.VcUsuTb01_Ape2 as 'Apellido2' from usutb01 inner join proftb04 on usutb01.VcUsuTb01_Cedula = proftb04.VcProfTb04_IdProfesor order by 'date added';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMateriaTb17_Listar_Todos` ()  begin
	select VcMateriaTb17_IdMateria as 'Id', VcMateriaTb17_Nombre as 'Nombre' from MateriaTb17
	order by 'date added';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaMatriculaTb30_CargarSeccion` (IN `idMater` VARCHAR(20), IN `idProf` VARCHAR(20))  begin 
select secciontb20.InSeccionTb20_IdSeccion as 'Id_Seccion',secciontb20.InSeccionTb20_Num_Grupo as 'num_grupo',gradotb13.VcGradoTb13_NombreGrado as 'Grado' from secciontb20 inner join secgradotb25 on secciontb20.InSeccionTb20_IdSeccion = secgradotb25.InSeccionTb20_IdSeccion join gradotb13 on secgradotb25.VcGradoTb13_IdGrado = gradotb13.VcGradoTb13_IdGrado join matriculatb30 on secciontb20.InSeccionTb20_IdSeccion = matriculatb30.InSeccionTb20_IdSeccion where matriculatb30.VcMateriaTb17_IdMateria = idMater and matriculatb30.VcProfTb04_IdProfesor = idProf;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaProfTb04_ActualizarProf` (IN `IdProf` VARCHAR(20), IN `FecNac` DATE, IN `Clave` VARCHAR(20), IN `Nom` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Telefono` VARCHAR(8), IN `Email` VARCHAR(100))  begin
	update usutb01, ProfTb04
    set usutb01.VcUsuTb01_Nombre = Nom,
    usutb01.VcUsuTb01_Ape1 = Ape1,usutb01.VcUsuTb01_Ape2 = Ape2,usutb01.VcUsuTb01_Direccion = Direccion,usutb01.VcUsuTb01_Telefono = Telefono,usutb01.VcUsuTb01_Email = Email,
    ProfTb04.VcProfTb04_IdProfesor = IdProf, ProfTb04.VcProfTb04_Clave = Clave,
    ProfTb04.DtProfTb04_FechaNac = FecNac
    where ProfTb04.VcProfTb04_IdProfesor = IdProf and usutb01.VcUsuTb01_Cedula = IdProf;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaProfTb04_BorrarProf` (IN `IdProf` VARCHAR(20))  begin
update proftb04 set VcProfTb04_Estado = 'I' where VcProfTb04_IdProfesor = IdProf;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaProfTb04_BuscarProfD` (IN `dato` VARCHAR(20))  begin
	select u.VcUsuTb01_Cedula as 'Cedula', u.VcUsuTb01_Nombre as 'Nombre', u.VcUsuTb01_Ape1 as 'Apellido1',
    u.VcUsuTb01_Ape2 as 'Apellido2', u.VcUsuTb01_Direccion as 'Direccion', u.CrUsuTb01_Sexo as 'Sexo',
    u.VcUsuTb01_Telefono as 'Telefono', u.VcUsuTb01_Email as 'Correo_Electronico',
    p.VcProfTb04_IdProfesor as 'Id_Profesor', p.DtProfTb04_FechaNac as 'Fecha_Nac',
    p.VcProfTb04_Clave as 'Clave', p.VcProfTb04_Estado as 'Estado'
    from ProfTb04 as p inner join usutb01 as u on p.VcProfTb04_IdProfesor = u.VcUsuTb01_Cedula
  where p.VcProfTb04_IdProfesor like concat('%',dato,'%') 
  or u.VcUsuTb01_Nombre like concat('%',dato,'%') 
  or u.VcUsuTb01_Ape1 like concat('%',dato,'%')
  or u.VcUsuTb01_Ape2 like concat('%',dato,'%') 
  or u.VcUsuTb01_Direccion like concat('%',dato,'%') 
  or u.CrUsuTb01_Sexo like concat(dato,'%')
  or u.VcUsuTb01_Email like concat('%',dato,'%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaProfTb04_GuardarProf` (IN `IdProf` VARCHAR(20), IN `NomProf` VARCHAR(20), IN `Ape1` VARCHAR(20), IN `Ape2` VARCHAR(20), IN `Direccion` VARCHAR(100), IN `Sexo` CHAR(1), IN `Telefono` VARCHAR(20), IN `Email` VARCHAR(20), IN `clave` VARCHAR(20), IN `FecNac` DATE)  begin
	insert into UsuTb01(VcUsuTb01_Cedula, VcUsuTb01_Nombre, VcUsuTb01_Ape1, VcUsuTb01_Ape2, VcUsuTb01_Direccion, CrUsuTb01_Sexo, VcUsuTb01_Telefono, VcUsuTb01_Email)
    values(IdProf, NomProf, Ape1, Ape2, Direccion, Sexo, Telefono, Email);
     insert into ProfTb04 (VcProfTb04_IdProfesor, DtProfTb04_FechaNac, VcProfTb04_Clave, VcProfTb04_Estado)
    values (IdProf, FecNac, clave, 'A');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaProfTb04_Listar` (IN `inicio` INT, IN `final` INT)  begin
 select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2', UsuTb01.VcUsuTb01_Direccion as 'Direccion', UsuTb01.CrUsuTb01_Sexo as 'Genero', 
 UsuTb01.VcUsuTb01_Telefono as 'Telefono', UsuTb01.VcUsuTb01_Email as 'Email', ProfTb04.VcProfTb04_Clave as 'Clave', 
 ProfTb04.DtProfTb04_FechaNac as 'Fecha_Nac', ProfTb04.VcProfTb04_Estado as 'Estado'
    from UsuTb01, ProfTb04
    where ProfTb04.VcProfTb04_IdProfesor = UsuTb01.VcUsuTb01_Cedula and proftb04.VcProfTb04_Estado = 'A'
	order by 'date added' limit inicio,final;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_ActualizarSeccion` (IN `id_grupo` VARCHAR(20), IN `cupo` INT, IN `num_grupo` INT)  BEGIN
update secciontb20 set InSeccionTb20_Num_Grupo = num_grupo,InSeccionTb20_Cupo = cupo where InSeccionTb20_IdSeccion = id_grupo;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_Borrar_Seccion` (IN `id_seccion` INT)  NO SQL
BEGIN
delete from SeccionTb20 where InSeccionTb20_IdSeccion = id_seccion;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_BuscarSec` (IN `id_sec` INT)  NO SQL
begin
select secciontb20.InSeccionTb20_IdSeccion as 'ID_Seccion',secciontb20.InSeccionTb20_Cupo as 'cupo',secciontb20.InSeccionTb20_Num_Grupo as 'Num_grupo',gradotb13.VcGradoTb13_NombreGrado as 'Grado' from secciontb20 inner join secgradotb25 on secgradotb25.InSeccionTb20_IdSeccion = secciontb20.InSeccionTb20_IdSeccion join gradotb13 on secgradotb25.VcGradoTb13_IdGrado = gradotb13.VcGradoTb13_IdGrado
where secciontb20.InSeccionTb20_IdSeccion = id_sec;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_Guardar_Seccion` (IN `cupo` INT, IN `num_grupo` INT, IN `Grado` VARCHAR(10))  begin
DECLARE CONT INT;
DECLARE id INT;
select COUNT(*) INTO CONT from SeccionTb20;
if(CONT > 0)
then insert into secciontb20(InSeccionTb20_cupo,InSeccionTb20_Num_Grupo) VALUES(cupo,num_grupo);
select InSeccionTb20_IdSeccion from secciontb20 order by InSeccionTb20_IdSeccion desc limit 1 into id;
insert into secgradotb25(VcGradoTb13_IdGrado,InSeccionTb20_IdSeccion)
select gradotb13.VcGradoTb13_IdGrado,secciontb20.InSeccionTb20_IdSeccion from gradotb13,secciontb20 where gradotb13.VcGradoTb13_IdGrado = Grado and secciontb20.InSeccionTb20_IdSeccion = id;
else insert into secciontb20(InSeccionTb20_cupo,InSeccionTb20_Num_Grupo) VALUES(cupo,num_grupo);
insert into secgradotb25(VcGradoTb13_IdGrado,InSeccionTb20_IdSeccion)
select gradotb13.VcGradoTb13_IdGrado,secciontb20.InSeccionTb20_IdSeccion from gradotb13,secciontb20 where gradotb13.VcGradoTb13_IdGrado = Grado;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_Listar` (IN `inicio` INT, IN `final` INT)  begin
select secciontb20.InSeccionTb20_IdSeccion as 'ID_Seccion',secciontb20.InSeccionTb20_Cupo as 'cupo',secciontb20.InSeccionTb20_Num_Grupo as 'Num_grupo',gradotb13.VcGradoTb13_NombreGrado as 'Grado' from secciontb20 inner join secgradotb25 on secgradotb25.InSeccionTb20_IdSeccion = secciontb20.InSeccionTb20_IdSeccion join gradotb13 on secgradotb25.VcGradoTb13_IdGrado = gradotb13.VcGradoTb13_IdGrado order by 'date addeed' limit inicio,final;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeccionTb20_Listar_Todos` ()  NO SQL
begin
select secciontb20.InSeccionTb20_IdSeccion as 'ID_Seccion',secciontb20.InSeccionTb20_Cupo as 'cupo',secciontb20.InSeccionTb20_Num_Grupo as 'Num_grupo',gradotb13.VcGradoTb13_NombreGrado as 'Grado' from secciontb20 inner join secgradotb25 on secgradotb25.InSeccionTb20_IdSeccion = secciontb20.InSeccionTb20_IdSeccion join gradotb13 on secgradotb25.VcGradoTb13_IdGrado = gradotb13.VcGradoTb13_IdGrado order by 'date added';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSecEstTb28_Listar_Asist` (IN `idSec` VARCHAR(20))  NO SQL
BEGIN
select UsuTb01.VcUsuTb01_Cedula as 'Cedula', UsuTb01.VcUsuTb01_Nombre  as 'Nombre', UsuTb01.VcUsuTb01_Ape1  as 'Apellido1',
 UsuTb01.VcUsuTb01_Ape2  as 'Apellido2' from usutb01 inner join secesttb28 on usutb01.VcUsuTb01_Cedula = secesttb28.VcEstTb03_IdEstudiante where secesttb28.InSeccionTb20_IdSeccion = idSec;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaSeguridadTb31_Validar_Usu` (IN `user` VARCHAR(20), IN `pass` VARCHAR(20))  BEGIN
if EXISTS(select proftb04.VcProfTb04_IdProfesor from proftb04 where proftb04.VcProfTb04_IdProfesor = user and proftb04.VcProfTb04_Clave = pass)
then select seguridadtb31.VcSeguridadTb31_Funcion as 'Funcion',seguridadtb31.VcSeguridadTb31_Glyphicons as 'Iconos',seguridadtb31.VcSeguridadTb31_SideNav as 'SideNav' from seguridadtb31 where seguridadtb31.InSeguridadTb31_Nivel = 2;
ELSEIF EXISTS(select admtb02.VcAdmTb02_IdAdmin from admtb02 where admtb02.VcAdmTb02_IdAdmin = user and admtb02.VcAdmTb02_Clave = pass)
then select seguridadtb31.VcSeguridadTb31_Funcion as 'Funcion',seguridadtb31.VcSeguridadTb31_Glyphicons as 'Iconos',seguridadtb31.VcSeguridadTb31_SideNav as 'SideNav' from seguridadtb31 where seguridadtb31.InSeguridadTb31_Nivel = 1;
end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admtb02`
--

CREATE TABLE `admtb02` (
  `VcAdmTb02_IdAdmin` varchar(20) NOT NULL,
  `VcAdmTb02_Clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admtb02`
--

INSERT INTO `admtb02` (`VcAdmTb02_IdAdmin`, `VcAdmTb02_Clave`) VALUES
('102220111', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `asiggradotb12`
--

CREATE TABLE `asiggradotb12` (
  `VcGradoTb13_IdGrado` varchar(20) NOT NULL,
  `VcProfTb04_IdProf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asiggradotb12`
--

INSERT INTO `asiggradotb12` (`VcGradoTb13_IdGrado`, `VcProfTb04_IdProf`) VALUES
('17', '101110111');

-- --------------------------------------------------------

--
-- Table structure for table `asigmateriatb19`
--

CREATE TABLE `asigmateriatb19` (
  `VcProfTb04_IdProfesor` varchar(20) NOT NULL,
  `VcMateriaTb17_IdMateria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asigmateriatb19`
--

INSERT INTO `asigmateriatb19` (`VcProfTb04_IdProfesor`, `VcMateriaTb17_IdMateria`) VALUES
('102410877', '2'),
('102470131', '4'),
('102520652', '5'),
('102550884', '7'),
('102430085', '7'),
('102520652', '7');

-- --------------------------------------------------------

--
-- Table structure for table `asistclasetb18`
--

CREATE TABLE `asistclasetb18` (
  `VcAsistClaseTb18_IdAsistClase` varchar(20) NOT NULL,
  `DtAsistClaseTb18_Fecha` date NOT NULL,
  `TmAsistClaseTb18_Hora` time NOT NULL,
  `VcAsistClaseTb18_Estado` varchar(20) NOT NULL,
  `VcMateriaTb17_IdMateria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asistcoletb08`
--

CREATE TABLE `asistcoletb08` (
  `VcAsistColeTb08_IdAsistCole` varchar(20) NOT NULL,
  `TmAsistColeTb08_HoraEntrada` time NOT NULL,
  `DtAsistColeTb08_FechaEntrada` date NOT NULL,
  `TmAsistColeTb08_HoraSalida` time NOT NULL,
  `DtAsistColeTb08_FechaSalida` date NOT NULL,
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asistesttb23`
--

CREATE TABLE `asistesttb23` (
  `VcAsistClaseTb18_IdAsistClase` varchar(20) NOT NULL,
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bachillertb14`
--

CREATE TABLE `bachillertb14` (
  `VcBachillerTb14_IdBachiller` varchar(20) NOT NULL,
  `VcBachillerTb14_NombreBachiller` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bachillertb14`
--

INSERT INTO `bachillertb14` (`VcBachillerTb14_IdBachiller`, `VcBachillerTb14_NombreBachiller`) VALUES
('12', 'Internacional'),
('5', 'Educacion media');

-- --------------------------------------------------------

--
-- Table structure for table `encreptb09`
--

CREATE TABLE `encreptb09` (
  `VcEncTb05_IdEncargado` varchar(20) NOT NULL,
  `VcRepTb10_IdReporte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enctb05`
--

CREATE TABLE `enctb05` (
  `VcEncTb05_IdEncargado` varchar(20) NOT NULL,
  `VcEncTb05_Clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enctb05`
--

INSERT INTO `enctb05` (`VcEncTb05_IdEncargado`, `VcEncTb05_Clave`) VALUES
('101500013', '1234'),
('101500657', '1234'),
('101510355', '1234'),
('101510370', '1234'),
('101520079', '1234'),
('101530549', '1234'),
('101570851', '1234'),
('101600906', '1234'),
('101610042', '1234'),
('101611004', '1234'),
('101620004', '1234'),
('101620131', '1234'),
('101620408', '1234'),
('101630925', '1234'),
('101640366', '1234'),
('101640853', '1234'),
('101670863', '1234'),
('101680222', '1234'),
('101680855', '1234'),
('101700931', '1234'),
('101730128', '1234'),
('101730153', '1234'),
('101730478', '1234'),
('101750234', '1234'),
('101760685', '1234'),
('101770499', '1234'),
('101780456', '1234'),
('101780517', '1234'),
('101780518', '1234'),
('101780672', '1234'),
('101780918', '1234'),
('101790398', '1234'),
('101800840', '1234'),
('101810297', '1234'),
('101820356', '1234'),
('101830461', '1234'),
('101850236', '1234'),
('101850956', '1234'),
('101880085', '1234'),
('101880533', '1234'),
('101880715', '1234'),
('101880933', '1234'),
('101880970', '1234'),
('101890521', '1234'),
('101890825', '1234'),
('101900768', '1234'),
('101900836', '1234'),
('101910094', '1234'),
('101910634', '1234'),
('101910905', '1234'),
('101930042', '1234'),
('101930269', '1234'),
('101930540', '1234'),
('101940494', '1234'),
('101940692', '1234'),
('101940973', '1234'),
('101960163', '1234'),
('101960579', '1234'),
('101960649', '1234'),
('101960826', '1234'),
('101980059', '1234'),
('101980110', '1234'),
('101980272', '1234'),
('101990064', '1234'),
('102000287', '1234'),
('402370069', '1234'),
('60780543', '1234'),
('60780544', '1234'),
('60780545', '1234'),
('60780546', '1234'),
('60780547', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `especialidadtb16`
--

CREATE TABLE `especialidadtb16` (
  `VcEspecialidadTb16_IdEspecialidad` varchar(20) NOT NULL,
  `VcEspecialidadTb16_Nombre` varchar(20) NOT NULL,
  `InEspecialidadTb16_Cupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `especialidadtb16`
--

INSERT INTO `especialidadtb16` (`VcEspecialidadTb16_IdEspecialidad`, `VcEspecialidadTb16_Nombre`, `InEspecialidadTb16_Cupo`) VALUES
('1234', 'Informatica', 20),
('E01', 'Informatica', 30),
('E02', 'Contabilidad', 15),
('E03', 'AyB', 20),
('E04', 'Turismo', 14),
('E05', 'Agropecuaria', 20),
('E06', 'Secretariado', 15),
('E07', 'Electrónica', 15),
('E08', 'Redes', 20);

-- --------------------------------------------------------

--
-- Table structure for table `estenctb07`
--

CREATE TABLE `estenctb07` (
  `VcEncTb05_IdEncargado` varchar(20) NOT NULL,
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estenctb07`
--

INSERT INTO `estenctb07` (`VcEncTb05_IdEncargado`, `VcEstTb03_IdEstudiante`) VALUES
('402370069', '504070202');

-- --------------------------------------------------------

--
-- Table structure for table `estreptb22`
--

CREATE TABLE `estreptb22` (
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL,
  `VcRepTb10_IdReporte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `esttb03`
--

CREATE TABLE `esttb03` (
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL,
  `DtEstTb03_FechaNac` date NOT NULL,
  `VcEstTb03_Adecuacion` varchar(20) NOT NULL,
  `VcEstTb03_Estado` varchar(20) NOT NULL,
  `VcEspecialidadTb16_IdEspecialidad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `esttb03`
--

INSERT INTO `esttb03` (`VcEstTb03_IdEstudiante`, `DtEstTb03_FechaNac`, `VcEstTb03_Adecuacion`, `VcEstTb03_Estado`, `VcEspecialidadTb16_IdEspecialidad`) VALUES
('11600007', '1995-03-03', 'No', 'A', '1234'),
('504070202', '1995-10-12', 'No', 'A', '1234'),
('603450678', '1995-03-20', 'No_Significativa', 'A', '1234'),
('808880888', '1980-12-12', 'No', 'A', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `funcreptb21`
--

CREATE TABLE `funcreptb21` (
  `VcFuncTb06_IdFuncionario` varchar(20) NOT NULL,
  `VcRepTb10_IdReporte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funtb06`
--

CREATE TABLE `funtb06` (
  `VcFunTb06_IdFuncionario` varchar(20) NOT NULL,
  `VcFunTb06_Clave` varchar(20) NOT NULL,
  `DtFunTb06_FechaNac` date NOT NULL,
  `VcFunTb06_Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funtb06`
--

INSERT INTO `funtb06` (`VcFunTb06_IdFuncionario`, `VcFunTb06_Clave`, `DtFunTb06_FechaNac`, `VcFunTb06_Estado`) VALUES
('606660666', '3456', '2017-10-11', 'A'),
('803430465', '1234', '2017-11-09', 'A'),
('809990999', '1234', '2017-11-01', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gradoesptb15`
--

CREATE TABLE `gradoesptb15` (
  `VcGradoEspTb15_IdGrado` varchar(20) NOT NULL,
  `VcEspecialidadTb15_IdEspecialidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradotb13`
--

CREATE TABLE `gradotb13` (
  `VcGradoTb13_IdGrado` varchar(20) NOT NULL,
  `VcGradoTb13_NombreGrado` varchar(20) NOT NULL,
  `VcBachillerTb14_IdBachiller` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gradotb13`
--

INSERT INTO `gradotb13` (`VcGradoTb13_IdGrado`, `VcGradoTb13_NombreGrado`, `VcBachillerTb14_IdBachiller`) VALUES
('17', '7', '12'),
('34', '10', '5');

-- --------------------------------------------------------

--
-- Table structure for table `graesttb26`
--

CREATE TABLE `graesttb26` (
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL,
  `VcGradoTb13_IdGrado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graesttb26`
--

INSERT INTO `graesttb26` (`VcEstTb03_IdEstudiante`, `VcGradoTb13_IdGrado`) VALUES
('504070202', '34');

-- --------------------------------------------------------

--
-- Table structure for table `horariostb29`
--

CREATE TABLE `horariostb29` (
  `InHorariosTb29_IdHorario` int(11) NOT NULL,
  `VcHorariosTb29_Dia` varchar(20) NOT NULL,
  `TmHorariosTb29_Hora_Inicio` time NOT NULL,
  `TmHorariosTb29_Hora_Final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horariostb29`
--

INSERT INTO `horariostb29` (`InHorariosTb29_IdHorario`, `VcHorariosTb29_Dia`, `TmHorariosTb29_Hora_Inicio`, `TmHorariosTb29_Hora_Final`) VALUES
(1, 'Martes', '07:00:00', '08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `inscmateriatb11`
--

CREATE TABLE `inscmateriatb11` (
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL,
  `VcInscMateriaTb17_IdMateria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materiatb17`
--

CREATE TABLE `materiatb17` (
  `VcMateriaTb17_IdMateria` varchar(20) NOT NULL,
  `VcMateriaTb17_Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materiatb17`
--

INSERT INTO `materiatb17` (`VcMateriaTb17_IdMateria`, `VcMateriaTb17_Nombre`) VALUES
('1', 'Español'),
('10', 'Química'),
('11', 'Física'),
('12', 'Biología'),
('2', 'Matematicas'),
('3', 'Estudios Sociales'),
('4', 'Ciencias'),
('5', 'Inglés'),
('6', 'Educación Física'),
('7', 'Religión'),
('8', 'Cívica'),
('9', 'Frances');

-- --------------------------------------------------------

--
-- Table structure for table `matriculatb30`
--

CREATE TABLE `matriculatb30` (
  `InSeccionTb20_IdSeccion` int(11) NOT NULL,
  `InHorariosTb29_IdHorario` int(11) NOT NULL,
  `VcMateriaTb17_IdMateria` varchar(20) NOT NULL,
  `VcProfTb04_IdProfesor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matriculatb30`
--

INSERT INTO `matriculatb30` (`InSeccionTb20_IdSeccion`, `InHorariosTb29_IdHorario`, `VcMateriaTb17_IdMateria`, `VcProfTb04_IdProfesor`) VALUES
(9, 1, '5', '102520652');

-- --------------------------------------------------------

--
-- Table structure for table `profreptb24`
--

CREATE TABLE `profreptb24` (
  `VcProfTb04_IdProfesor` varchar(20) NOT NULL,
  `VcRepTb10_IdReporte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proftb04`
--

CREATE TABLE `proftb04` (
  `VcProfTb04_IdProfesor` varchar(20) NOT NULL,
  `VcProfTb04_Clave` varchar(20) NOT NULL,
  `DtProfTb04_FechaNac` date NOT NULL,
  `VcProfTb04_Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proftb04`
--

INSERT INTO `proftb04` (`VcProfTb04_IdProfesor`, `VcProfTb04_Clave`, `DtProfTb04_FechaNac`, `VcProfTb04_Estado`) VALUES
('101110111', '1111', '2000-12-03', 'A'),
('102410145', '1234', '1993-10-04', 'A'),
('102410237', '1234', '1993-10-04', 'A'),
('102410877', '1234', '1993-10-04', 'A'),
('102420116', '1234', '1993-10-04', 'A'),
('102420633', '1234', '1993-10-04', 'A'),
('102430085', '1234', '1993-10-04', 'A'),
('102430416', '1234', '1993-10-04', 'A'),
('102430649', '1234', '1993-10-04', 'A'),
('102430963', '1234', '1993-10-04', 'A'),
('102431003', '1234', '1993-10-04', 'A'),
('102440210', '1234', '1993-10-04', 'A'),
('102440360', '1234', '1993-10-04', 'A'),
('102440685', '1234', '1993-10-04', 'A'),
('102440846', '1234', '1993-10-04', 'A'),
('102450942', '1234', '1993-10-04', 'A'),
('102460080', '1234', '1993-10-04', 'A'),
('102460603', '1234', '1993-10-04', 'A'),
('102460900', '1234', '1993-10-04', 'A'),
('102460911', '1234', '1993-10-04', 'A'),
('102470131', '1234', '1993-10-04', 'A'),
('102470140', '1234', '1993-10-04', 'A'),
('102470488', '1234', '1993-10-04', 'A'),
('102470911', '1234', '1993-10-04', 'A'),
('102480242', '1234', '1993-10-04', 'A'),
('102480337', '1234', '1993-10-04', 'A'),
('102480340', '1234', '1993-10-04', 'A'),
('102480483', '1234', '1993-10-04', 'A'),
('102480563', '1234', '1993-10-04', 'A'),
('102480570', '1234', '1993-10-04', 'A'),
('102480611', '1234', '1993-10-04', 'A'),
('102480641', '1234', '1993-10-04', 'A'),
('102480645', '1234', '1993-10-04', 'A'),
('102480711', '1234', '1993-10-04', 'A'),
('102480769', '1234', '1993-10-04', 'A'),
('102490205', '1234', '1993-10-04', 'A'),
('102490271', '1234', '1993-10-04', 'A'),
('102490650', '1234', '1993-10-04', 'A'),
('102500066', '1234', '1993-10-04', 'A'),
('102500113', '1234', '1993-10-04', 'A'),
('102500339', '1234', '1993-10-04', 'A'),
('102510012', '1234', '1993-10-04', 'A'),
('102510350', '1234', '1993-10-04', 'A'),
('102510493', '1234', '1993-10-04', 'A'),
('102510899', '1234', '1993-10-04', 'A'),
('102510952', '1234', '1993-10-04', 'A'),
('102520652', '1234', '1993-10-04', 'A'),
('102530189', '1234', '1993-10-04', 'A'),
('102530213', '1234', '1993-10-04', 'A'),
('102530214', '1234', '1993-10-04', 'A'),
('102530619', '1234', '1993-10-04', 'A'),
('102531000', '1234', '1993-10-04', 'A'),
('102540248', '1234', '1993-10-04', 'A'),
('102540547', '1234', '1993-10-04', 'A'),
('102540643', '1234', '1993-10-04', 'A'),
('102540791', '1234', '1993-10-04', 'A'),
('102550293', '1234', '1993-10-04', 'A'),
('102550523', '1234', '1993-10-04', 'A'),
('102550884', '1234', '1993-10-04', 'A'),
('102550920', '1234', '1993-10-04', 'A'),
('102560021', '1234', '1993-10-04', 'A'),
('102560145', '1234', '1993-10-04', 'A'),
('102560754', '1234', '1993-10-04', 'A'),
('102560926', '1234', '1993-10-04', 'A'),
('102560953', '1234', '1993-10-04', 'A'),
('102560981', '1234', '1993-10-04', 'A'),
('102570066', '1234', '1993-10-04', 'A'),
('102570424', '1234', '1993-10-04', 'A'),
('102570438', '1234', '1993-10-04', 'A'),
('102570829', '1234', '1993-10-04', 'A'),
('102580258', '1234', '1993-10-04', 'A'),
('102580300', '1234', '1993-10-04', 'A'),
('102580760', '1234', '1993-10-04', 'A'),
('102580844', '1234', '1993-10-04', 'A'),
('102590364', '1234', '1993-10-04', 'A'),
('102590781', '1234', '1993-10-04', 'A'),
('102590965', '1234', '1993-10-04', 'A'),
('102590988', '1234', '1993-10-04', 'A'),
('102591009', '1234', '1993-10-04', 'A'),
('102600023', '1234', '1993-10-04', 'A'),
('102600045', '1234', '1993-10-04', 'A'),
('102600221', '1234', '1993-10-04', 'A'),
('102600279', '1234', '1993-10-04', 'A'),
('102600934', '1234', '1993-10-04', 'A'),
('102610165', '1234', '1993-10-04', 'A'),
('102610217', '1234', '1993-10-04', 'A'),
('102610244', '1234', '1993-10-04', 'A'),
('102610521', '1234', '1993-10-04', 'A'),
('102610764', '1234', '1993-10-04', 'A'),
('102620222', '1234', '1993-10-04', 'A'),
('102620342', '1234', '1993-10-04', 'A'),
('102620585', '1234', '1993-10-04', 'A'),
('102630207', '1234', '1993-10-04', 'A'),
('102630280', '1234', '1993-10-04', 'A'),
('102630326', '1234', '1993-10-04', 'A'),
('102640244', '1234', '1993-10-04', 'A'),
('102640504', '1234', '1993-10-04', 'A'),
('102640511', '1234', '1993-10-04', 'A'),
('102640553', '1234', '1993-10-04', 'A'),
('102640785', '1234', '1993-10-04', 'A'),
('102640868', '1234', '1993-10-04', 'A'),
('102650516', '1234', '1993-10-04', 'A'),
('102650590', '1234', '1993-10-04', 'A'),
('102660149', '1234', '1993-10-04', 'A'),
('102660616', '1234', '1993-10-04', 'A'),
('102670579', '1234', '1993-10-04', 'A'),
('102670588', '1234', '1993-10-04', 'A'),
('102670768', '1234', '1993-10-04', 'A'),
('102671001', '1234', '1993-10-04', 'A'),
('102680355', '1234', '1993-10-04', 'A'),
('116000071', '1234', '1990-10-12', 'A'),
('116000072', '1234', '1995-11-12', 'A'),
('116000073', '1234', '1994-07-11', 'A'),
('116000074', '1234', '1991-03-12', 'A'),
('116000075', '1234', '1993-10-04', 'A'),
('1313123', '1234', '2000-12-09', 'A'),
('202220222', '1234', '1998-06-04', 'A'),
('303330333', '1234', '0000-00-00', 'I'),
('707770777', '1234', '0200-12-12', 'I'),
('7575', '1234', '1999-12-12', 'A'),
('802340345', '1234', '2017-11-15', 'I'),
('807770777', '1234', '2017-11-14', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `reptb10`
--

CREATE TABLE `reptb10` (
  `VcRepTb10_IdReporte` varchar(20) NOT NULL,
  `DtRepTb10_FechaReporte` date NOT NULL,
  `TmRepTb10_HoraReporte` time NOT NULL,
  `VcAsistClaseTb18_IdAsistClase` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seccionproftb27`
--

CREATE TABLE `seccionproftb27` (
  `VcProfTb04_IdProfesor` varchar(20) NOT NULL,
  `InSeccionTb20_IdSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secciontb20`
--

CREATE TABLE `secciontb20` (
  `InSeccionTb20_IdSeccion` int(11) NOT NULL,
  `InSeccionTb20_Cupo` int(11) NOT NULL,
  `InSeccionTb20_Num_Grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secciontb20`
--

INSERT INTO `secciontb20` (`InSeccionTb20_IdSeccion`, `InSeccionTb20_Cupo`, `InSeccionTb20_Num_Grupo`) VALUES
(9, 30, 2),
(10, 25, 4),
(11, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `secesttb28`
--

CREATE TABLE `secesttb28` (
  `VcEstTb03_IdEstudiante` varchar(20) NOT NULL,
  `InSeccionTb20_IdSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secesttb28`
--

INSERT INTO `secesttb28` (`VcEstTb03_IdEstudiante`, `InSeccionTb20_IdSeccion`) VALUES
('603450678', 9),
('504070202', 9);

-- --------------------------------------------------------

--
-- Table structure for table `secgradotb25`
--

CREATE TABLE `secgradotb25` (
  `VcGradoTb13_IdGrado` varchar(20) NOT NULL,
  `InSeccionTb20_IdSeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secgradotb25`
--

INSERT INTO `secgradotb25` (`VcGradoTb13_IdGrado`, `InSeccionTb20_IdSeccion`) VALUES
('17', 9),
('34', 10),
('34', 11);

-- --------------------------------------------------------

--
-- Table structure for table `seguridadtb31`
--

CREATE TABLE `seguridadtb31` (
  `VcSeguridadTb31_Funcion` varchar(150) NOT NULL,
  `VcSeguridadTb31_Glyphicons` varchar(150) NOT NULL,
  `VcSeguridadTb31_SideNav` varchar(150) NOT NULL,
  `InSeguridadTb31_Id` int(11) NOT NULL,
  `InSeguridadTb31_Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seguridadtb31`
--

INSERT INTO `seguridadtb31` (`VcSeguridadTb31_Funcion`, `VcSeguridadTb31_Glyphicons`, `VcSeguridadTb31_SideNav`, `InSeguridadTb31_Id`, `InSeguridadTb31_Nivel`) VALUES
('function principal(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/principal.php\');}', '<li><a class=\"glyphicon glyphicon-home\" style=\"margin-top:25px; \" href=\"index.php\"></a></li>', '<a href=\"index.php\">Inicio</a>', 1, 1),
('function profesor(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Profesor.php\');}', ' <li><a class=\"glyphicon glyphicon-blackboard\" style=\"margin-top:15px; \" href=\"#\" onclick=\"profesor();\"></a></li>', '<a href=\"#\" onclick=\"profesor();\">Profesores</a>', 2, 1),
('function seccion(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Seccion-Grupo.php\');}   ', '<li><a class=\"glyphicon glyphicon-sound-7-1\" style=\"margin-top:15px; \" href=\"#\" onclick=\"seccion();\"></a></li>', '<a href=\"#\" onclick=\"seccion();\">Secciones</a>', 4, 1),
('function encargado(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Encargado.php\');}', '<li><a class=\"glyphicon glyphicon-eye-open\" style=\"margin-top:15px; \" href=\"#\" onclick=\"encargado();\"></a></li>', '<a href=\"#\" onclick=\"encargado();\">Padres</a>', 5, 1),
('function funcionario(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Funcionario.php\');}', '<li><a class=\"glyphicon glyphicon-user\" style=\"margin-top:15px; \" href=\"#\" onclick=\"funcionario();\"></a></li>', '<a href=\"#\" onclick=\"funcionario();\">Funcionarios</a>', 6, 1),
('function estudiante(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Estudiante.php\');}', '<li><a class=\"glyphicon glyphicon-education\" style=\"margin-top:15px; \" href=\"#\" onclick=\"estudiante();\"></a></li>', '<a href=\"#\" onclick=\"estudiante();\">Estudiantes</a>', 7, 1),
('function materia(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_1/Materia.php\');}', ' <li><a class=\"glyphicon glyphicon-book\" style=\"margin-top:15px; \" href=\"#\" onclick=\"materia();\"></a></li>', '<a href=\"#\" onclick=\"materia();\">Materias</a>', 8, 1),
('function principal(){$(\"#contenido\").load(\'Vista/Seg_Nivel/Nivel_2/Principal.php\');}', '<li><a class=\"glyphicon glyphicon-home\" style=\"margin-top:25px; \" href=\"#\" onclick=\"principal();\"></a></li>', '<a href=\"#\" onclick=\"principal();\">Inicio</a>', 9, 2),
('function Asistencia(){$(\'#contenido\').load(\'Vista/Seg_Nivel/Nivel_2/Asistencia.php\');}', '<li><a class=\"glyphicon glyphicon-list-alt\" href=\"#\" style=\"margin-top:15px;\" onclick=\"Asistencia();\"></a></li>', '<a href=\"#\" onclick=\"Asistencia();\">Asistencia</a>', 10, 2),
('function Mensaje(){$(\'#contenido\').load(\'Vista/Seg_Nivel/Nivel_2/Mensaje.php\');}', '<li><a class=\"glyphicon glyphicon-envelope\" href=\"#\" style=\"margin-top:15px;\" onclick=\"Mensaje();\"></a></li>', '<a href=\"#\" onclick=\"Mensaje();\">Mensajes</a>', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usutb01`
--

CREATE TABLE `usutb01` (
  `VcUsuTb01_Cedula` varchar(20) NOT NULL,
  `VcUsuTb01_Nombre` varchar(20) NOT NULL,
  `VcUsuTb01_Ape1` varchar(20) NOT NULL,
  `VcUsuTb01_Ape2` varchar(20) NOT NULL,
  `VcUsuTb01_Direccion` varchar(100) NOT NULL,
  `CrUsuTb01_Sexo` char(1) NOT NULL,
  `VcUsuTb01_Telefono` varchar(8) NOT NULL,
  `VcUsuTb01_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usutb01`
--

INSERT INTO `usutb01` (`VcUsuTb01_Cedula`, `VcUsuTb01_Nombre`, `VcUsuTb01_Ape1`, `VcUsuTb01_Ape2`, `VcUsuTb01_Direccion`, `CrUsuTb01_Sexo`, `VcUsuTb01_Telefono`, `VcUsuTb01_Email`) VALUES
('101074994', 'FRANCISCA', 'ROJAS', 'UREÑA', 'Nicoya', 'F', '26453312', 'fran@gmail.com'),
('101110111', 'Sofia', 'Herrera', 'Villalobos', 'Hojancha', 'F', '23445563', 'aasd@asda.com'),
('101141843', 'SACRAMENTO', 'MORA', 'MORALES', 'Moracia', 'M', '77654423', 'sacra@outlook.com'),
('101230816', 'VIRGINIA', 'ROVIRA', 'PANIAGUA', 'Nosara', 'F', '65444123', 'virg@outlook.com'),
('101260454', 'MARIA DE LOS ANGELES', 'ESQUIVEL', 'ESQUIVEL', 'Nandayure', 'F', '24356745', 'esq@outlook.com'),
('101270084', 'JESUS', 'FLORES', 'AGUERO', 'Nicoya', 'M', '22456788', 'jes@outlook.com'),
('101280455', 'SALVADOR', 'VILLALTA', 'MORA', 'Samara', 'M', '67553699', 'salva@outlook.com'),
('101340245', 'ROSA SANTANA', 'PORRAS', 'AVALOS', 'Hojancha', 'F', '60908766', 'santa@outlook.com'),
('101380356', 'ISABEL', 'PARRA', 'MOYA', 'Los Angeles', 'F', '87669099', 'isab@outlook.com'),
('101390480', 'FIDELINA', 'HERNANDEZ', 'ARIAS', 'San José', 'F', '87662299', 'fid@outlook.com'),
('101430812', 'CARMEN', 'BLANCO', 'CALVO', 'Nicoya', 'F', '88669199', 'carm@outlook.com'),
('101440109', 'ESPIRITU SANTO', 'MONTERO', 'CORRALES', 'Los Angeles', 'M', '77658890', 'esp@gmail.com'),
('101440154', 'JOSE MARIA', 'HERRERA', 'PORRAS', 'Nosara', 'M', '87633099', 'josma@outlook.com'),
('101440182', 'MARIA ISABEL', 'JIMENEZ', 'QUIROS', 'Los Angeles', 'F', '89679099', 'marisa@outlook.com'),
('101450787', 'JAVIER', 'ROJAS', 'AGUERO', 'Nosara', 'F', '87669099', 'jav@gmail.com'),
('101460065', 'MARIA FRANCISCA', 'MORA', 'ELIZONDO', 'Los Angeles', 'F', '87600099', 'mfran@outlook.com'),
('101460864', 'JAIME', 'ROJAS', 'JIMENEZ', 'Nicoya', 'M', '87669099', 'jai@outlook.com'),
('101460943', 'YOLANDA', 'PERAZA', 'MONGE', 'Nicoya', 'F', '67541233', 'yol@gmail.com'),
('101490236', 'SARA', 'RODRIGUEZ', 'RODRIGUEZ', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101500013', 'DAISY', 'QUIROS', 'SANTAMARIA', 'Nicoya', 'F', '88765690', 'sara@gmail.com'),
('101500657', 'ADORACION', 'GOMEZ', 'MORA', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101510355', 'RAFAEL MAXIMO', 'QUIROS', 'SALAZAR', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101510370', 'ROSALINA', 'PORRAS', 'AVALOS', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101520079', 'AUSTELINA', 'AGUERO', 'GOMEZ', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101530549', 'ERNESTO', 'GONZALEZ', 'ALVAREZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101570851', 'BENEDICTO', 'AGUERO', 'CASTILLO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101600906', 'FILOMENA', 'MORA', 'AGUERO', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101610042', 'CLARA', 'VENEGAS', 'MORA', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101611004', 'APODEMIO ', 'ROBLES', 'ROJAS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101620004', 'ANGELA', 'ARIAS', 'MONTERO', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101620131', 'ELODIA', 'MORA', 'GOMEZ', 'Nosara', 'F', '88765690', 'sara@gmail.com'),
('101620408', 'FERNANDO', 'VILLALOBOS', 'VILLALOBOS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101630925', 'ABEL ', 'MENA', 'PEREZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101640366', 'ABEL', 'ROJAS', 'TENORIO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101640853', 'OLGA', 'CHAVES', 'VARGAS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101670863', 'VICTOR MANUEL', 'MASIS', 'MASIS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101680222', 'VIRGINIA', 'FONSECA', 'ALVARADO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101680855', 'MARIA HORTENSIA', 'ESPINOZA', 'AGUERO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101700931', 'DORALIA', 'MUÑOZ', 'LOBO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101730128', 'JESUS', 'RAMIREZ', 'BEGNOZZI', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101730153', 'JOSE HUMBERTO', 'MATARRITA', 'MATARRITA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101730478', 'MARIA TERESA', 'JIMENEZ', 'MARIN', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101750234', 'ROSA', 'MUÑOZ', 'BADILLA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101760685', 'ELODIA', 'HERNANDEZ', 'NAVARRO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101770499', 'ALFREDO', 'BADILLA', 'MARIN', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101780456', 'JOSE JESUS', 'RAMIREZ', 'FALLAS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101780517', 'ZENEIDA', 'SILES', 'MONGE', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101780518', 'RICARDO', 'ROJAS', 'TENORIO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101780672', 'ROSA ADILIA', 'CALDERON', 'CHAVES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101780918', 'MERCEDES', 'PINTO', 'GONZALEZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101790398', 'JUANA', 'MASIS', 'MASIS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101800840', 'OFELIA', 'VENEGAS', 'MORA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101810297', 'LUIS CARLOS', 'GONZALEZ', 'SILES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101820356', 'MARIA EUGENIA', 'BONILLA', 'FERNANDEZ ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101830461', 'ALBERTINA', 'SILES', 'RAMIREZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101850236', 'ELSA', 'GARRO', 'ROJAS', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101850956', 'ROSALINA RAMONA', 'CASCANTE', 'GARCIA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101880085', 'MARTA', 'BONILLA', 'BONILLA ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101880533', 'MIGUEL ANGEL', 'BARRIENTOS', 'ALFARO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101880715', 'JACINTO', 'VEGA', 'MARIN', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101880933', 'MISAEL', 'BARRIENTOS', 'MORA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101880970', 'OSCAR', 'SABORIO', 'GUERRERO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101890521', 'ISABEL', 'BARQUERO', 'MUÑOZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101890825', 'MARIA', 'ROJAS', 'AZOFEIFA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101900768', 'REYES', 'JIMENEZ', 'PEREZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101900836', 'CRISTINA', 'BARQUERO', 'GONZALEZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101910094', 'JOSE LUIS', 'VALVERDE', 'SALAZAR', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101910634', 'LUCIA', 'DELGADO', 'MORALES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101910905', 'TEODOLINDA', 'MORA', 'ELIZONDO', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101930042', 'MARIA', 'DELGADO', 'CESPEDES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101930269', 'TERESA', 'SANCHEZ', 'MORALES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101930540', 'RAMON ETELBERTO', 'JIMENEZ', 'ZUÑIGA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101940494', 'MANUEL', 'ESQUIVEL', 'MOLINA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101940692', 'MARIA DE LOS ANGELES', 'AVALOS', 'PADILLA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101940973', 'ESPIRITU', 'AGUERO', 'GOMEZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101960163', 'OFELIA', 'BARRANTES', 'CARVAJAL', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101960253', 'ASDRUBAL', 'FONSECA', 'CHACON', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101960579', 'ESMERALDA', 'BERMUDEZ', 'VILLALTA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101960649', 'JOSE ENRIQUE', 'MENDEZ', 'ARAYA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101960826', 'ROSA MARIA', 'ROMERO', 'AVILA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101980059', 'ENRIQUE', 'GONZALEZ', 'ESPINOZA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101980110', 'TRINIDAD', 'ARAYA', 'RODRIGUEZ', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101980272', 'AMADO', 'MARIN', 'MADRIGAL', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('101990064', 'SALVADORA', 'ROJAS', 'MONTES', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('102000287', 'OTONIEL', 'MADRIGAL', 'HERRERA', 'Nosara', 'M', '88765690', 'sara@gmail.com'),
('102410145', 'HARRY', 'JENKINS', 'CHAVARRIA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102410237', 'CECILIA', 'PORTILLA', 'IBARRA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102410877', 'FRANCISCA ELENA', 'PAVON', 'PAVON', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102420116', 'ANTONIO', 'FERNANDEZ ', 'SALAZAR', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102420633', 'LUIS ALBERTO', 'BRENES', 'CORDERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102430085', 'MARIA TERESA', 'AGUILAR', 'DELGADO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102430416', 'LIGIA', 'MONTOYA', 'MONTOYA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102430649', 'MIGUEL', 'ARAYA', 'MATAMOROS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102430963', 'RAFAEL', 'CARDENAS ', 'OBANDO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102431003', 'GILBERT', 'ALFARO', 'CORRALES', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102440210', 'EMILIO', 'MONTURIOL', 'MUÑOZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102440360', 'ERNESTO', 'DONINELLI', 'FONSECA ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102440685', 'JOSE MANUEL', 'MORA', 'FERNANDEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102440846', 'MAXIMINO', 'DIAZ', 'TREJOS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102450942', 'MARIA LUISA', 'JIMENEZ', 'BOLAÑOS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102460080', 'VICTORIANO', 'MENA', 'VENEGAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102460603', 'MARGARITA', 'ARANA', 'GOMEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102460900', 'ALICE ANGELA', 'ALVARADO', 'VARGAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102460911', 'VICTOR MANUEL', 'MONGE', 'SEGURA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102470131', 'EDGAR', 'CHAVES', 'GUERRERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102470140', 'MARIA EMILIA', 'ARGUEDAS', 'JIMENEZ ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102470488', 'RAMON ALBERTO', 'AGUERO', 'GOMEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102470911', 'FRANCISCO', 'DELGADO', 'DELGADO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480242', 'MIRYAM', 'GARRO', 'CASTRO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480337', 'ELIETH', 'VALVERDE', 'SALAZAR', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480340', 'BERSABE', 'FONSECA', 'CHACON', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480483', 'MIGUEL ANGEL', 'RAMIREZ', 'CASTRO ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480563', 'OSCAR ANTONIO', 'PERALTA', 'ARROYO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480570', 'SOLEDAD', 'BONILLA', 'BONILLA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480611', 'JUAN', 'SILES', 'MONGE', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480641', 'JORGE', 'ZUÑIGA', 'RODRIGUEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480645', 'ORLANDO', 'VASQUEZ', 'MESEN', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480711', 'MANUEL FRANCISCO', 'CHAMORRO', 'ROVERSI ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102480769', 'ISMELDA OBELIA', 'FERNANDEZ', 'RODRIGUEZ ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102490205', 'LUZMILDA', 'MUÑOZ', 'SANDOVAL', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102490271', 'VICTORIA', 'ALFARO', 'RODRIGUEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102490650', 'ALICE', 'OROZCO', 'HERNANDEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102500066', 'JOSE LUIS', 'ZUÑIGA', 'ZUÑIGA ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102500113', 'ROSA MERCEDES', 'NEIRA', 'FUERTES', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102500339', 'BERNARDITA', 'RETANA', 'ROJAS  ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102510012', 'ROSA', 'JIMENEZ', 'MONTERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102510350', 'SONIA ANTONIA', 'SABATINI', 'FALLAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102510493', 'CARLOS ALBERTO ', 'NUÑEZ', 'ACEVEDO ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102510899', 'MANUEL ANTONIO ', 'VILLALTA', 'MORA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102510952', 'YOLANDA', 'GARRO', 'CHAVARRIA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102520652', 'GUIDO', 'DURAN', 'FALLAS ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102530189', 'JORGE EDUARDO', 'CASTRO', 'DINALTES', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102530213', 'SOCORRO', 'AGUERO', 'JIMENEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102530214', 'YOLANDA ', 'JIMENEZ', 'GONZALEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102530619', 'MARTA CECILIA', 'AGUILAR', 'CONTRERAS ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102531000', 'MIGUEL ALBERTO', 'SABORIO', 'GUERRERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102540248', 'JOSE ANGEL', 'MORA', 'BERMUDEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102540547', 'ALVARO', 'VARGAS', 'MENANI ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102540643', 'RAFAEL ANGEL', 'TENORIO', 'SANCHEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102540791', 'EDWIN', 'ULATE', 'SOLANO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102550293', 'MARGARITA', 'BARQUERO', 'GONZALEZ ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102550523', 'RAMON', 'QUIROS', 'GUEVARA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102550884', 'XINIA', 'RAMIREZ', 'BEGNOZZI', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102550920', 'DIMAS', 'BERMUDEZ', 'JIMENEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102560021', 'LUIS FERNANDO ', 'ARCE', 'MONTIEL', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102560145', 'DOMINGO ', 'MATAMOROS', 'VALVERDE', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('1025603456', 'asda', 'asdasd', 'asdasd', 'dfgdffdg', 'F', '12345678', 'asd@asd.com'),
('102560754', 'RAFAEL ARTURO', 'MOLINA ', 'SALAZAR', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102560926', 'JULIO CESAR', 'LOAIZA', 'GONZALEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102560953', 'MARIA ELENA', 'HERNANDEZ', 'FAERRON ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102560981', 'RAFAEL ANGEL', 'RODRIGUEZ', 'SEGURA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102570066', 'MARIA DE LOS ANGELES', 'AGUILAR', 'MADRIGAL', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102570424', 'ELSIE', 'GUTIERREZ', 'GUTIERREZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102570438', 'EUGENIO', 'FERNANDEZ ', 'ULLOA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102570829', 'RAMON', 'MORA', 'MORA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102580258', 'LUZ MARIA', 'PICADO', 'ALFARO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102580300', 'TERESA', 'ARCE', 'VILLEGAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102580760', 'MARIA DE LOS ANGELES', 'CARVAJAL', 'SABORIO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102580844', 'CECILIO', 'BADILLA', 'GUEVARA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102590364', 'OMAR', 'TORRES', 'BERMUDEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102590781', 'MIGUEL ANGEL', 'BARRIENTOS', 'MONGE', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102590965', 'CARMEN LIA', 'CASTRO', 'FERNANDEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102590988', 'LUZ BELEN', 'FALLAS', 'LOPEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102591009', 'FLORY', 'GAMBOA', 'AGUERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102600023', 'RODRIGO', 'LEON', 'SOTO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102600045', 'FLORY', 'CALDERON', 'CALDERON', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102600221', 'JOSE LUIS', 'VARGAS', 'CHACON  ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102600279', 'GILBERT', 'SEQUEIRA', 'ORTIZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102600934', 'MARIA MELIDA', 'MENDEZ', 'BERMUDEZ ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102610165', 'OVIDIO', 'ROJAS', 'AGUERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102610217', 'FRANKLIN', 'CALDERON', 'OROZCOS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102610244', 'OSTELINA', 'CUBERO', 'ROJAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102610521', 'EMERITA', 'ALVARADO', 'SANCHEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102610764', 'DANIEL ALBERTO', 'RUIZ', 'MUÑOZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102620222', 'ALVARO', 'CASTRO', 'RODRIGUEZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102620342', 'RIGOBERTO', 'CHINCHILLA', 'SEGURA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102620585', 'JORGE', 'MORA', 'SIBAJA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102630207', 'FILIBERTO', 'JIMENEZ', 'JIMENEZ ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102630280', 'HUMBERTINO', 'MONGE', 'TENORIO ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102630326', 'CLOTILDE', 'JIMENEZ', 'CERDAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640244', 'JOSE MARIA', 'SOLANO', 'CHAVARRIA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640504', 'SOLEDAD', 'NUÑEZ', 'ACEVEDO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640511', 'FABIO', 'CHACON', 'FALLAS', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640553', 'NOEMY', 'MORA', 'MORA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640785', 'FRANCISCO', 'MARCHENA', 'ACOSTA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102640868', 'DIANA', 'MORAN', 'AYALES', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102650516', 'HUGO', 'MONTERO', 'NAVARRO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102650590', 'PABLO', 'CASTELLON', 'ALVAREZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102660149', 'ELOY MARIO', 'JIMENEZ', 'ROIG', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102660616', 'VIRGILIO', 'VILLARREAL', 'MONTERO', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102670579', 'VIRGINIA', 'MURILLO', 'CRUZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102670588', 'ANA LUZ', 'SANCHEZ', 'DIAZ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102670768', 'PLINIO', 'RAMIREZ', 'CHACON', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102671001', 'CARLOS', 'REYES', 'PADILLA ', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('102680355', 'JESUS', 'MARTINEZ', 'URTUBIA', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('11600007', 'Anyulieth', 'Villalobos', 'Peralta', 'Nandayure', 'F', '86471288', 'anyuvillalobos@gmail.com'),
('116000071', 'Ana', 'Fernández', 'Esquivel', 'Corralillo', 'F', '60918664', 'ana@hotmail.com'),
('116000072', 'Jose', 'Lopez', 'Venegas', 'Hojancha', 'M', '60918664', 'jose@outlook.com'),
('116000073', 'Jesus', 'Lobo', 'Vargas', 'Alajuela', 'M', '60918664', 'jesus@gmail.com'),
('116000074', 'Henry', 'Chavarría', 'Picado', 'Heredia', 'M', '60918664', 'henry@yahoo.es'),
('116000075', 'Josefina', 'Montero', 'Rojas', 'Santa Clara', 'F', '60918664', 'fina@outlook.com'),
('202220222', 'Dilan', 'Esquivel', 'Venegas', 'Hojancha', 'M', '60606060', 'dilanesquivelvenegas@gmail.com'),
('203740645', 'Albert', 'Esquivel', 'Alvarado', 'Nicoya', 'M', '38475635', 'asd@asd.com'),
('303330333', 'Sonia', 'Venegas', 'Araya', 'Hojancha', 'F', '26598260', 'nada@gmail.com'),
('402370069', 'Fernanda', 'Herrera', 'Villalobos', 'Hojancha', 'F', '62001746', 'nose@gmail.com'),
('504070202', 'Derian', 'Esquivel', 'Venegas', 'Hojancha', 'M', '60918664', 'deresquivel@outlook.com'),
('603450678', 'Mauricio', 'Chevez', 'Carrillo', 'Nicoya', 'M', '21345678', 'qwe@sdf.com'),
('606660666', 'Geiner', 'Esquivel', 'Rodriguez', 'Hojancha', 'M', '29384756', 'asd@gmail.com'),
('60780543', 'Luis', 'Herra', 'Torres', 'Nandayure', 'M', '88888888', 'lu@outlook.com'),
('60780544', 'Antonio', 'Pérez', 'Pérez', 'Nicoya', 'M', '88888888', 'an@hotmail.com'),
('60780545', 'María', 'Hernández', 'Gutiérrez', 'Samara', 'F', '88888888', 'ma@yahoo.es'),
('60780546', 'Angela', 'Alvarado', 'Gómez', 'Tamarindo', 'F', '88888888', 'angk@hotmail.com'),
('60780547', 'Lucía', 'Chacón', 'Sequeira', 'San José', 'F', '88888888', 'luci@gmail.com'),
('707770777', 'Alexa', 'Esquivel', 'Venegas', 'Hojancha', 'F', '3456789', 'asd@gmail.com'),
('802340123', 'DASDAD', 'asdasd', 'zdadsasd', 'asdasdad', '', '11233243', 'asd@asd.com'),
('802340345', 'xasdasd', 'asdasdsad', 'asdasdasd', 'asdasdasd', 'F', '12342345', 'asd@as.com'),
('803430465', 'asd', 'asd', 'asd', 'asd', 'F', '12345612', 'asd@asd.com'),
('807770777', 'asxas', 'casda', 'csdfsdf', 'fsdfsdf', 'M', '23455678', 'asd@asd.com'),
('808880888', 'Keiner', 'Esquivel', 'Venegas', 'Hojancha', 'M', '28374655', 'asd@gmail.com'),
('809990999', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdasd', 'M', '12345678', 'asd@asd.com'),
('909990999', 'Jose', 'Molina', 'Cascante', 'Puntarenas', 'M', '38475647', 'asd@asd.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admtb02`
--
ALTER TABLE `admtb02`
  ADD PRIMARY KEY (`VcAdmTb02_IdAdmin`);

--
-- Indexes for table `asiggradotb12`
--
ALTER TABLE `asiggradotb12`
  ADD KEY `FK_Prof_idx` (`VcProfTb04_IdProf`),
  ADD KEY `FK_Gra_idx` (`VcGradoTb13_IdGrado`);

--
-- Indexes for table `asigmateriatb19`
--
ALTER TABLE `asigmateriatb19`
  ADD KEY `FK_Prof_idx` (`VcProfTb04_IdProfesor`),
  ADD KEY `FK_Mat_idx` (`VcMateriaTb17_IdMateria`);

--
-- Indexes for table `asistclasetb18`
--
ALTER TABLE `asistclasetb18`
  ADD PRIMARY KEY (`VcAsistClaseTb18_IdAsistClase`),
  ADD KEY `FK_Mat_idx` (`VcMateriaTb17_IdMateria`);

--
-- Indexes for table `asistcoletb08`
--
ALTER TABLE `asistcoletb08`
  ADD PRIMARY KEY (`VcAsistColeTb08_IdAsistCole`),
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`);

--
-- Indexes for table `asistesttb23`
--
ALTER TABLE `asistesttb23`
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`),
  ADD KEY `FK_AsiC_idx` (`VcAsistClaseTb18_IdAsistClase`);

--
-- Indexes for table `bachillertb14`
--
ALTER TABLE `bachillertb14`
  ADD PRIMARY KEY (`VcBachillerTb14_IdBachiller`);

--
-- Indexes for table `encreptb09`
--
ALTER TABLE `encreptb09`
  ADD KEY `FK_Enc_idx` (`VcEncTb05_IdEncargado`),
  ADD KEY `FK_Rep_idx` (`VcRepTb10_IdReporte`);

--
-- Indexes for table `enctb05`
--
ALTER TABLE `enctb05`
  ADD PRIMARY KEY (`VcEncTb05_IdEncargado`);

--
-- Indexes for table `especialidadtb16`
--
ALTER TABLE `especialidadtb16`
  ADD PRIMARY KEY (`VcEspecialidadTb16_IdEspecialidad`);

--
-- Indexes for table `estenctb07`
--
ALTER TABLE `estenctb07`
  ADD KEY `FK_Enc` (`VcEncTb05_IdEncargado`),
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`);

--
-- Indexes for table `estreptb22`
--
ALTER TABLE `estreptb22`
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`),
  ADD KEY `FK_Rep_idx` (`VcRepTb10_IdReporte`);

--
-- Indexes for table `esttb03`
--
ALTER TABLE `esttb03`
  ADD PRIMARY KEY (`VcEstTb03_IdEstudiante`),
  ADD KEY `FK_Esp_idx` (`VcEspecialidadTb16_IdEspecialidad`);

--
-- Indexes for table `funcreptb21`
--
ALTER TABLE `funcreptb21`
  ADD KEY `FK_Fun_idx` (`VcFuncTb06_IdFuncionario`),
  ADD KEY `FK_Rep_idx` (`VcRepTb10_IdReporte`);

--
-- Indexes for table `funtb06`
--
ALTER TABLE `funtb06`
  ADD PRIMARY KEY (`VcFunTb06_IdFuncionario`);

--
-- Indexes for table `gradoesptb15`
--
ALTER TABLE `gradoesptb15`
  ADD KEY `FK_Esp_idx` (`VcEspecialidadTb15_IdEspecialidad`),
  ADD KEY `FK_Gra_idx` (`VcGradoEspTb15_IdGrado`);

--
-- Indexes for table `gradotb13`
--
ALTER TABLE `gradotb13`
  ADD PRIMARY KEY (`VcGradoTb13_IdGrado`),
  ADD KEY `FK_Bac_idx` (`VcBachillerTb14_IdBachiller`);

--
-- Indexes for table `graesttb26`
--
ALTER TABLE `graesttb26`
  ADD KEY `FK_Gra_idx` (`VcGradoTb13_IdGrado`),
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`);

--
-- Indexes for table `horariostb29`
--
ALTER TABLE `horariostb29`
  ADD PRIMARY KEY (`InHorariosTb29_IdHorario`);

--
-- Indexes for table `inscmateriatb11`
--
ALTER TABLE `inscmateriatb11`
  ADD KEY `FK_Est_idx` (`VcEstTb03_IdEstudiante`),
  ADD KEY `FK_Mat_idx` (`VcInscMateriaTb17_IdMateria`);

--
-- Indexes for table `materiatb17`
--
ALTER TABLE `materiatb17`
  ADD PRIMARY KEY (`VcMateriaTb17_IdMateria`),
  ADD KEY `Fk_Mat` (`VcMateriaTb17_IdMateria`);

--
-- Indexes for table `matriculatb30`
--
ALTER TABLE `matriculatb30`
  ADD UNIQUE KEY `FK_Prof_Matri` (`VcProfTb04_IdProfesor`),
  ADD KEY `FK_Sec_Matri` (`InSeccionTb20_IdSeccion`),
  ADD KEY `FK_Hor_Matri` (`InHorariosTb29_IdHorario`),
  ADD KEY `FK_Mat_Matri` (`VcMateriaTb17_IdMateria`);

--
-- Indexes for table `profreptb24`
--
ALTER TABLE `profreptb24`
  ADD KEY `FK_Prof_idx` (`VcProfTb04_IdProfesor`),
  ADD KEY `FK_Rep_idx` (`VcRepTb10_IdReporte`);

--
-- Indexes for table `proftb04`
--
ALTER TABLE `proftb04`
  ADD PRIMARY KEY (`VcProfTb04_IdProfesor`),
  ADD KEY `FK_Prof` (`VcProfTb04_IdProfesor`);

--
-- Indexes for table `reptb10`
--
ALTER TABLE `reptb10`
  ADD PRIMARY KEY (`VcRepTb10_IdReporte`),
  ADD KEY `FK_AsCla_idx` (`VcAsistClaseTb18_IdAsistClase`);

--
-- Indexes for table `seccionproftb27`
--
ALTER TABLE `seccionproftb27`
  ADD KEY `FK_Prof_S_idx` (`VcProfTb04_IdProfesor`),
  ADD KEY `FK_Sec_P_idx` (`InSeccionTb20_IdSeccion`);

--
-- Indexes for table `secciontb20`
--
ALTER TABLE `secciontb20`
  ADD PRIMARY KEY (`InSeccionTb20_IdSeccion`);

--
-- Indexes for table `secesttb28`
--
ALTER TABLE `secesttb28`
  ADD KEY `FK_Sec_Est` (`VcEstTb03_IdEstudiante`),
  ADD KEY `FK_Est_Sec` (`InSeccionTb20_IdSeccion`) USING BTREE;

--
-- Indexes for table `secgradotb25`
--
ALTER TABLE `secgradotb25`
  ADD KEY `FK_S_Gra_idx` (`VcGradoTb13_IdGrado`),
  ADD KEY `FK_Sec_G_idx` (`InSeccionTb20_IdSeccion`);

--
-- Indexes for table `seguridadtb31`
--
ALTER TABLE `seguridadtb31`
  ADD PRIMARY KEY (`InSeguridadTb31_Id`);

--
-- Indexes for table `usutb01`
--
ALTER TABLE `usutb01`
  ADD PRIMARY KEY (`VcUsuTb01_Cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `horariostb29`
--
ALTER TABLE `horariostb29`
  MODIFY `InHorariosTb29_IdHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `secciontb20`
--
ALTER TABLE `secciontb20`
  MODIFY `InSeccionTb20_IdSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `seguridadtb31`
--
ALTER TABLE `seguridadtb31`
  MODIFY `InSeguridadTb31_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asiggradotb12`
--
ALTER TABLE `asiggradotb12`
  ADD CONSTRAINT `FK_Gra` FOREIGN KEY (`VcGradoTb13_IdGrado`) REFERENCES `gradotb13` (`VcGradoTb13_IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Prof` FOREIGN KEY (`VcProfTb04_IdProf`) REFERENCES `proftb04` (`VcProfTb04_IdProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asigmateriatb19`
--
ALTER TABLE `asigmateriatb19`
  ADD CONSTRAINT `FK_Mat_Asig` FOREIGN KEY (`VcMateriaTb17_IdMateria`) REFERENCES `materiatb17` (`VcMateriaTb17_IdMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Prof_Asig` FOREIGN KEY (`VcProfTb04_IdProfesor`) REFERENCES `proftb04` (`VcProfTb04_IdProfesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asistclasetb18`
--
ALTER TABLE `asistclasetb18`
  ADD CONSTRAINT `FK_Mat` FOREIGN KEY (`VcMateriaTb17_IdMateria`) REFERENCES `materiatb17` (`VcMateriaTb17_IdMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asistcoletb08`
--
ALTER TABLE `asistcoletb08`
  ADD CONSTRAINT `FK_Est_Asis` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asistesttb23`
--
ALTER TABLE `asistesttb23`
  ADD CONSTRAINT `FK_AsCla_Est` FOREIGN KEY (`VcAsistClaseTb18_IdAsistClase`) REFERENCES `asistclasetb18` (`VcAsistClaseTb18_IdAsistClase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Est_AsistEst` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `encreptb09`
--
ALTER TABLE `encreptb09`
  ADD CONSTRAINT `FK_Enc_Rep` FOREIGN KEY (`VcEncTb05_IdEncargado`) REFERENCES `enctb05` (`VcEncTb05_IdEncargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Rep_Enc` FOREIGN KEY (`VcRepTb10_IdReporte`) REFERENCES `reptb10` (`VcRepTb10_IdReporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estenctb07`
--
ALTER TABLE `estenctb07`
  ADD CONSTRAINT `FK_Enc` FOREIGN KEY (`VcEncTb05_IdEncargado`) REFERENCES `enctb05` (`VcEncTb05_IdEncargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Est` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estreptb22`
--
ALTER TABLE `estreptb22`
  ADD CONSTRAINT `FK_Est_Rep` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Rep_Est` FOREIGN KEY (`VcRepTb10_IdReporte`) REFERENCES `reptb10` (`VcRepTb10_IdReporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `esttb03`
--
ALTER TABLE `esttb03`
  ADD CONSTRAINT `FK_Esp` FOREIGN KEY (`VcEspecialidadTb16_IdEspecialidad`) REFERENCES `especialidadtb16` (`VcEspecialidadTb16_IdEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `funcreptb21`
--
ALTER TABLE `funcreptb21`
  ADD CONSTRAINT `FK_Fun` FOREIGN KEY (`VcFuncTb06_IdFuncionario`) REFERENCES `funtb06` (`VcFunTb06_IdFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Rep` FOREIGN KEY (`VcRepTb10_IdReporte`) REFERENCES `reptb10` (`VcRepTb10_IdReporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gradoesptb15`
--
ALTER TABLE `gradoesptb15`
  ADD CONSTRAINT `FK_Esp_Grado` FOREIGN KEY (`VcEspecialidadTb15_IdEspecialidad`) REFERENCES `especialidadtb16` (`VcEspecialidadTb16_IdEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Gra_Grado` FOREIGN KEY (`VcGradoEspTb15_IdGrado`) REFERENCES `gradotb13` (`VcGradoTb13_IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gradotb13`
--
ALTER TABLE `gradotb13`
  ADD CONSTRAINT `FK_Bac` FOREIGN KEY (`VcBachillerTb14_IdBachiller`) REFERENCES `bachillertb14` (`VcBachillerTb14_IdBachiller`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `graesttb26`
--
ALTER TABLE `graesttb26`
  ADD CONSTRAINT `FK_Est_Gra` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Gra_Est` FOREIGN KEY (`VcGradoTb13_IdGrado`) REFERENCES `gradotb13` (`VcGradoTb13_IdGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inscmateriatb11`
--
ALTER TABLE `inscmateriatb11`
  ADD CONSTRAINT `FK_Est_Insc` FOREIGN KEY (`VcEstTb03_IdEstudiante`) REFERENCES `esttb03` (`VcEstTb03_IdEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Mat_Insc` FOREIGN KEY (`VcInscMateriaTb17_IdMateria`) REFERENCES `materiatb17` (`VcMateriaTb17_IdMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profreptb24`
--
ALTER TABLE `profreptb24`
  ADD CONSTRAINT `FK_Prof_Rep` FOREIGN KEY (`VcProfTb04_IdProfesor`) REFERENCES `proftb04` (`VcProfTb04_IdProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Rep_Prof` FOREIGN KEY (`VcRepTb10_IdReporte`) REFERENCES `reptb10` (`VcRepTb10_IdReporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reptb10`
--
ALTER TABLE `reptb10`
  ADD CONSTRAINT `FK_AsCla` FOREIGN KEY (`VcAsistClaseTb18_IdAsistClase`) REFERENCES `asistclasetb18` (`VcAsistClaseTb18_IdAsistClase`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seccionproftb27`
--
ALTER TABLE `seccionproftb27`
  ADD CONSTRAINT `FK_Prof_S` FOREIGN KEY (`VcProfTb04_IdProfesor`) REFERENCES `proftb04` (`VcProfTb04_IdProfesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Sec_P` FOREIGN KEY (`InSeccionTb20_IdSeccion`) REFERENCES `secciontb20` (`InSeccionTb20_IdSeccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `secgradotb25`
--
ALTER TABLE `secgradotb25`
  ADD CONSTRAINT `FK_S_Gra` FOREIGN KEY (`VcGradoTb13_IdGrado`) REFERENCES `gradotb13` (`VcGradoTb13_IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Sec_G` FOREIGN KEY (`InSeccionTb20_IdSeccion`) REFERENCES `secciontb20` (`InSeccionTb20_IdSeccion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
