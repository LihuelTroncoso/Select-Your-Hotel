show databases;
create database MelinaBilotti;
use MelinaBilotti;

create table Proveedores (num_Prov int, Nombre varchar(30), Dirección int, Email varchar(30), Teléfono int, cuit int, Localidad varchar(30),
constraint PK_num_Prov Primary Key (num_Prov));

create table Artículo (nom_Artículo int, Nombre varchar (30), Precio_VP int, Stock int,
constraint PK_nom_Artículo Primary Key (nom_Artículo));

create table Compras (Num int, Fecha datetime, Artículo int, Cantidad int, Valor float, Proveedor int,
constraint PK_Num Primary Key (Num),
constraint FK_Artículo Foreign Key (Artículo) references Artículo (nom_Artículo),
constraint FK_Proveedor Foreign Key (Proveedor) references Proveedores (num_Prov));

create table Cliente (num_Cliente


create table Ventas (num_Venta int, Fecha datetime, Artículo int, Cantidad int, Valor int, Cliente int,
constraint PK_num_Venta Primary Key (num_Venta),
constraint FK_Artículo Foreign Key (Artículo) references Artículo (nom_Artículo),
constraint FK_Cliente Foreign Key (Cliente) references Cliente (num_Cliente));


drop table                                                                                                                                                                                                                                                                                                                                                                                                                                                                 qqڝg+{K�GO��������.B۬Fj�ц�?(C��[!a�ҍ��t�]萷ءT��7�7���iF\��z�j⏜1��*
�Ǒ�������7�Ι�h���Ce�g2RS�a��D�pΉ��tZ�6e6�[��nil<g���]�x���xדƻ<YL��v�S�H��1�6xYY��ʎꨎ�6x9�]E<���I��U��ي��G{���൜5�Df���v��i]�	e=�es�J�Y�iJ�����a
�y��|��_5�4a����5�o��s�ȡ���b�'�>��ux�^?`�~X��oB���3r