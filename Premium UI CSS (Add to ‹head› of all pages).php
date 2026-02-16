<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
body{
    font-family: 'Poppins', sans-serif;
    background:#f5f5f5;
    margin:0;
}
header{
    background:#ff6600;
    padding:15px;
    color:white;
    text-align:center;
}
.container{
    padding:20px;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:20px;
}
.card{
    background:white;
    border-radius:12px;
    padding:15px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}
.card:hover{
    transform:translateY(-5px);
}
button{
    background:#ff6600;
    border:none;
    padding:10px;
    border-radius:8px;
    color:white;
    font-weight:bold;
    width:100%;
    cursor:pointer;
}
input{
    padding:8px;
    width:80%;
    margin-bottom:8px;
}
</style>
