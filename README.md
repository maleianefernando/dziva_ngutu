```bash
Dziva Ngutu -  Sitema de Gestão de Material Acadêmico  
```



# Requisitos

Certifique-se de ter intalado e configurado no teu computador os seguintes componentes:

1. **XAMPP** (versão v3.3.0 ou superior), baixe no **[site oficial](https://www.apachefriends.org/index.html)**.
2. **PHP** versão **8.2** ou **superior**.
3. **Composer** apartir do site **[https://www.getcomposer.org/download](https://www.getcomposer.org/download).**
4. **Node JS** versão **14.16** ou **superior.**
5. Um navegador web para acessar a aplicação.

---

# Instalação

### Xampp Instalado
No xampp faça de um START dos seguintes módulos **Apache** e **MySQL**

### Configuração da App

Use o terminal na raíz do projecto e clone o repositório usando o seguinte comando.
```bash
git clone https://github.com/maleianefernando/dziva_ngutu
```

**Instalar Dependencias**

1. Use o comando : <code>composer update</code> para instalar as dependências do composer

3. Use o comando : <code>npm install</code> para instalar dependencies necessárias

4. Use o comando :  ``` npm install -D tailwindcss postcss autoprefixer ``` para instalar as dependências do tailwind css

5. Use o comando :  ``` npm run build ``` para fazer o build do front-end

**Rodar a App**

1. Renomeie o arquivo "<code>.env.example</code>" para "``` .env ```".

2. Use o comando:  <code>php artisan db:seed</code> para criar um utilizador padrão.

3. Use o comando : <code>php artisan serve</code> para correr a aplicação no navegador.

---

# Credenciais para teste
Temos o utilizador **admin** como administrador:
- email: **admin@gmail.com**
- Password: **passpass**

---
