@if(env("CLAVE")!=null)
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<div class="card col-md-6 offset-md-3">
    <div class="card-header">
        Iniciar sesion
    </div>
    <div class="card-body form-group">
        <label>Correo:</label>
        <input class="form-control" id="email" type="email"/>
        <label>Contraseña:</label>
        <input class="form-control" id="pass" type="password"/>
        <br>
        <input class="btn btn-default" id="singin" value="enviar" type="submit">
    </div>
</div>
<script>
    document.getElementById("singin").onclick=()=>{
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
                    alert(json);
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
    };
</script>
@endif