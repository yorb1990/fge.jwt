# Generador de token JWT (con compresion incluida)
- comprecion con lz-string
- almacenado con cross storage

## instalacion
```
composer require fge/jwt
```
instalara el paquete y sus dependencias

espacionde nombre 
```
fge\jwt\src
```

## ejemplo

### crear
```
fge\jwt\src\jwt $token=new fge\jwt\src\jwt(env("CLAVE"));
$error="";
$obj=["user"=>"jjforpjfir"];
if($token->genjwt($obj,$error)){
  //exito en $token->token
}
//error en $error
```

## decifrar
```
$error="";
$jwt=$token;
fge\jwt\src\jwt $dtoken=new fge\jwt\src\jwt(env("CLAVE"));
if(decryptp1($jwt)){
      if(decryptp1_5($jwt)){
            if(decryptp2()){
                 if(decryptp3()){
                       if(decryptp4($error)){
                             //exito en 
                       }else{
                             //error en $error
                       }
                 }else{
                       //formato invalido (token json interno)
                 }
            }else{
                //decifrado AES incorrecto
            }
      }else{
           //error numero de token no valido
      }
}else{
//error de formato
}
```
