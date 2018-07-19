@if(env("CLAVE")!=null)
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<div class="card col-md-6 offset-md-3">
    <div class="card-header">
        Iniciar sesion
    </div>
    <div class="card-body form-group">
        <div id="pre">
            <label>Correo:</label>
            <input class="form-control" id="email" type="email"/>
        </div>
        <div id="pos">
            <label>Contraseña:</label>
            <input class="form-control" id="pass" type="password"/>
        </div>
        <br>
        <input class="btn btn-default" id="singin" value="enviar" type="submit">
    </div>
</div>
<script>
    if(localStorage.getItem("email")!=null){
        document.getElementById("email").value=localStorage.getItem("email");
        var url="{{ (str_replace("-","+",str_replace("_","=",str_replace(" ","/",$_GET['preurl'])))) }}";        
        if(localStorage.getItem(localStorage.getItem("email"))!=null){
            url=atob(url);
            window.location.href = url+"?token-jwt="+localStorage.getItem(document.getElementById("email").value);
        }
    }
    document.getElementById("pos").style.display = 'none';
    document.getElementById("singin").onclick=()=>{
        if(document.getElementById("pre").style.display == 'none'){
            const data={
                clave:"{{env("CLAVE")}}",
                email:document.getElementById("email").value,
                pass:document.getElementById("pass").value};
            fetch('{{env('APP_URL')}}'+'/fge-tok/jwt',{
                method:'post',
                headers: {
                'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(function(response) {            
                if(response.ok){
                    response.json()
                    .then(function(json) {            
                        localStorage.setItem(document.getElementById("email").value, json);
                        window.location.href = "/?token-jwt="+json;
                    });
                }else{
                    response.json()
                    .then(function(json){
                        alert(json.message)
                    });
                }
            })
            .catch(function(data){
                console.log(data);
            });
        }else{
            if(localStorage.getItem(document.getElementById("email").value)==null){
                document.getElementById("pre").style.display = 'none';                
                document.getElementById("pos").style.display = 'block';         
                localStorage.setItem("email",document.getElementById("email").value);
            }else{
                //localStorage.removeItem(document.getElementById("email").value)
                localStorage.setItem("email",document.getElementById("email").value);
                window.location.href = "/?token-jwt="+localStorage.getItem(document.getElementById("email").value);
            }
            
        }
    };
</script>
@endif