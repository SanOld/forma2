var redirect;// путь перенаправления браузера после выхода из профайла
var errorMsg;// заголовок сообщения об ошибках
var SelInTrue; // состояние файла - выбран
var SelInFalse;//состояние файла - не выбран
var errorText; //массив возможных ошибок при проверке формы
   
   
 //действия после загрузки страницы  
window.onload=function(){

   if (document.body.hasAttribute("lang")){
 
   switch (document.body.lang){
        case "ru":
           redirect="../ru/login.php";  
           errorMsg = "При заполнении формы допущены следующие ошибки:\n\n"; 
           SelInTrue='Файл выбран';
           SelInFalse='Файл не выбран';
           errorText = { 
                 1 : "Не заполнено поле 'Имя'\n",
                 2 : "Введите имя, используя только буквы\n", 
                 3 : "Не заполнено поле 'Фамилия'\n",
                 4 : "Введите фамилию, используя только буквы\n",
                 5 : "Не заполнено поле 'Логин'\n",
                 6 : "Введите логин, используя только буквы и цифры\n",            
                 7 : "Не прикреплен файл\n",
                 8 : "Не заполнено поле 'E-mail'\n", 
                 9 : "Неверно заполнено поле 'E-mail'\n",            
                 10 : "Пароли не совпадают\n",
                 11 : "Не заполнено поле 'Пароль'\n",
                 12 : "В поле 'Пароль' введено менее 6-ти символов\n"
           }   
                 
        break;
        case "en":
           redirect="../en/login.php";  
           errorMsg = "When filling out the form the following bug:\n\n"; 
           SelInTrue='File is selected';
           SelInFalse='File is not selected';
           errorText = { 
                  1 : "Please enter 'firstname'\n",
                  2 : "Enter the name using only letters\n", 
                  3 : "Please enter 'lastname'\n",
                  4 : "Enter the lastname using only letters\n",
                  5 : "Please enter 'Login'\n",
                  6 : "Enter login using only letters and numbers\n",            
                  7 : "No file attached\n",
                  8 : "Please enter 'E-mail'\n", 
                  9 : "Invalid field filled 'E-mail'\n",            
                  10 : "Passwords do not match\n",
                  11 : "Please enter 'Password'\n",
                  12 : "In the 'Password' Enter at least 6 characters\n" 
           }
        break;    
    }
   }

}

function CheckresultsForm(form, loginform) { 

      // Заранее объявим необходимые переменные 
      var el, // Сам элемент 
            elName, // Имя элемента формы 
            value, // Значение 
            type; // Атрибут type для input-ов 


      // Массив списка ошибок, по дефолту пустой      
      var errorList = [];     
      // Хэш с текстом ошибок (ключ - ID ошибки)
      //  
      // Получаем семейство всех элементов формы 
      // Проходимся по ним в цикле 
  for (var i = 0; i < form.elements.length; i++) { 
            el = form.elements[i]; 
            elName = el.nodeName.toLowerCase(); 
            value = el.value; 
            if (elName == "input") { // INPUT 
                  // Определяем тип input-а 
                  type = el.type.toLowerCase(); 
                  // Разбираем все инпуты по типам и обрабатываем содержимое 
                  switch (type) { 
                        case "text" : 
                            var re = /^[A-Za-zА-Яа-яЁё]+$/ ;
                            switch (el.name){
                                case "fistname" :
                                    if (value == "")  {errorList.push(1);el.focus();}
                                    if (!re.test(value))  {errorList.push(2);el.focus()}
                                break;
                                case "lastname" :
                                    if (value == "")  {errorList.push(3); el.focus();}
                                    if (!re.test(value))  {errorList.push(4); el.focus();}                               
                                break;  
                                case "login" :
                                    re = /^[A-Za-zА-Яа-яЁё,0-9]+$/;
                                    if (value == "")  {errorList.push(5);el.focus();}
                                    if (!re.test(value))  {errorList.push(6);el.focus();}
                                break;  
                                //проверка если использовать type="text" а не type="email" для данного поля
                                case "email" :
                                    var re = /^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i;
                                    if (value == "")  {errorList.push(8);el.focus();}
                                    if (!re.test(value))  {errorList.push(9);el.focus();}
                                break;
                        break; 
                            }
                        break; 
                        case "file" : 
                            //возможна проверка, если необходима
                             // if (value == "") errorList.push(7); 
                        break; 
                        case "checkbox" : 
                              // Ничего не делаем, хотя можем 
                        break; 
                        case "email" :
                              var re = /^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i;
                              if (value == "")  {errorList.push(8);el.focus();}
                              if (!re.test(value))  {errorList.push(9);el.focus();}
                        break; 
                       
                        default : 
                              // Сюда попадают input-ы, которые не требуют обработки 
                        break; 
                  }
              }
 
      } 

        //Проверка для формы регистрации
        if (!loginform){
            //Проверка совпадения паролей
              var psw1=document.querySelector('#psw1');
              var psw2=document.querySelector('#psw2');

            //Проверяем заполненность поля
              if (psw1.value == "") errorList.push(11);
              if (psw1.value.length < 6) errorList.push(12);
               //сравниваем пароли
              if (psw1.value != psw2.value) {
                  //очищаем введенные значения
                  psw1.value='';
                  psw2.value='';
                  //передаем фокус в поле первого пароля
                  psw1.focus();
                  //записываем ошибку в массив
                  errorList.push(10); 
             }
       //
       }  
 
      // Финальная стадия 
      // Если массив ошибок пуст - возвращаем true 
      if (!errorList.length) {return form.submit();}; 
      // Если есть ошибки - формируем сообщение, выовдим alert 
      // и возвращаем false 
      
      //Выводим ошибки
        for (i = 0; i < errorList.length; i++) { 
            errorMsg += errorText[errorList[i]] + "\n"; 
        } 
        alert(errorMsg); 

      return false;    
}

function Selectionfile(element){
   var text=document.querySelector('mark');
   if(element.value!==''){
       text.innerHTML=SelInTrue;text.style.color='black';
   }
   else{
       text.innerHTML=SelInFalse;;text.style.color='#BEBEBE';
   }
}

function exit(){
    //очищаем куки
    delete_cookie ( "id" );
    delete_cookie ( "hash" );
    //перенаправляем браузер
    location.href=redirect;  

}

function delete_cookie ( cookie_name )
{
    var cookie_date = new Date ( );  // Текущая дата и время
    cookie_date.setTime ( cookie_date.getTime() - 1 );// -1 секунду
    document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}


//объкт для запроса
function getXmlHttp(){
	  var xmlhttp;
	  try {
	    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (e) {
	    try {
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch (E) {
	      xmlhttp = false;
	    }
	  }
	  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	    xmlhttp = new XMLHttpRequest();
	  }
	  return xmlhttp;
} 





//смена состояния checkbox отражаем в базе
function ChangeCheck(el, id){
	
// (1) создать объект для запроса к серверу
	    var req = getXmlHttp()  
	    req.onreadystatechange = function() {  
	        // onreadystatechange активируется при получении ответа сервера
	 
			if (req.readyState != 4) return;

			if(req.status == 200)   // status=0 при ошибках сети, иначе status=HTTP-код ошибки
			{ 		 
					//обработка ответа
					if(req.responseText!="1"){
                                            //при неудачном ответе возвращаем значение
                                            alert(req.responseText);
						el.checked=!el.checked;
					}				
			}
			else
			{
                                //при неудачном ответе возвращаем значение
				el.checked=!el.checked;
				alert('Ошибка изменения состояния ' + req.status + ': ' + req.statusText);
				return; 
			}
	    }
// (3) задать адрес подключения

	   //асинхронный зарос
             req.open('GET', 'http://test.library.in.ua/open/changecheck.php?name='+el.name+'&user_id='+id+'&flag='+el.checked, true); 
		req.setRequestHeader('Content-Type', 'text/html');		
// (4)
	    req.send(null);  // отослать запрос  

}