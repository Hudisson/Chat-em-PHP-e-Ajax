

const xhr = new XMLHttpRequest(); // 1. Cria uma nova instância de requisição

xhr.open('GET', 'https://sua-api.com/dados'); // 2. Configura o método (GET) e a URL

xhr.onreadystatechange = function() { // 3. Define o que acontece quando o estado da requisição muda
  if (xhr.readyState === 4) { // 4. Verifica se a requisição foi concluída (estado 4)
    if (xhr.status === 200) { // 5. Verifica se a requisição foi bem-sucedida (status 200)
      const data = JSON.parse(xhr.responseText);
      console.log(data);
    } else {
      console.error('Erro na requisição:', xhr.status);
    }
  }
};

xhr.send(); // 6. Envia a requisição ao servidor

