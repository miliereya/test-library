async function getAllBooks(){
	
    const response = await fetch('http://kast-test.ru/getBooks.php');
    if(!response.ok){
        return
    }
    let jsonResponse = await response.json();
    jsonResponse.forEach(element =>{

        let section = document.getElementById('mainSection')
        section.append(createBook(element.id, element.name, element.author, element.pages, element.isRead))
	
    })
	let readBtns = document.getElementsByClassName('is_read')
Array.from(readBtns).forEach( btn=>{
    btn.addEventListener('change', async ()=>{
      let itemToRefresh = document.querySelector('input[name="' + btn.name +'"]')
      if(itemToRefresh.checked){
      		let request = await sendEdit('notRead',btn.name)
      } else {
      		let request = await sendEdit('yesRead',btn.name)
      }
    })
})
  	let delBtns = document.getElementsByClassName('item__Delete')
  	Array.from(delBtns).forEach( btn=>{
    btn.addEventListener('click', async ()=>{
  		let request = await sendEdit('delete', btn.dataset.id)
        location.reload()
    })
})
}

function changeMod(mod){
	if(mod==='toSign'){
    	document.getElementById('entBlock').className="dnone"
      	document.getElementById('signBlock').className="dflex"
    } else{
    	document.getElementById('signBlock').className="dnone"
      	document.getElementById('entBlock').className="dflex"
	}
}
function signChecker(){
    let regLogin = login.value
    let regPass = pass.value
    let regName = nickname.value
    if(regLogin.length < 6 || regLogin.length > 50){
        alert('The length of the login must be more than 5 characters and less than 50')
        return
    } else if(regPass.length < 8 || regPass.length > 20){
        alert('The password must be at least 8 characters long and no more than 20')
        return
    } else if(regName.length < 3 || regName.length > 20){
        alert('The name must be at least 3 characters long and no more than 20')
      	return
    }
    (async ()=>{
        const response = await fetch('http://kast-test.ru/register.php', {
            method: 'POST',
            headers: {
                'Content-type':'application/x-www-form-urlencoded'
            },
            body: `login=${regLogin}&password=${regPass}&name=${regName}`
        })
        if(document.cookie===""){
          	alert('This login already exists')
        } else{
        	location.reload()
        }

    })()
}

function loginChecker(){
    let logLogin = loginEnt.value
    let logPass = passEnt.value
    if(logLogin.length < 6 || logLogin.length > 50){
        alert('The length of the login must be more than 5 characters and less than 50')
        return
    } else if(logPass.length < 8 || logPass.length > 20){
        alert('The password must be at least 8 characters long and no more than 20')
        return
    }
    (async ()=>{
        const response = await fetch('http://kast-test.ru/auth.php', {
            method: 'POST',
            headers: {
                'Content-type':'application/x-www-form-urlencoded'
            },
            body: `login=${logLogin}&password=${logPass}`
        })
       	if(response.url==='http://kast-test.ru/auth.php'){
        	location.reload()
        } else {
         	alert('Wrong login or password') 
        }

    })()
}

function addBook(){
    let bkName = bookName.value
    let bkAuthor = author.value
    let bkPages = pages.value
    let bkRead
    
    bkPages = Math.abs(bkPages)
  	bkPages = Math.round(bkPages)
    if(bkName.length < 2 || bkName.length>100){
    	alert('The length of the book name can\'t be less than 2 symbols or more than 100') 
      	return
    } else if(bkAuthor.length < 2 || bkAuthor.length>50){
    	alert('The length of the author name can\'t be less than 2 symbols or more than 50') 
      	return
    }
	if(document.getElementById('read').checked===true){
    	bkRead = 'yes'
    } else {
    	bkRead = 'no'
    }
    (async ()=>{
        const response = await fetch('http://kast-test.ru/addbook.php', {
            method: 'POST',
            headers: {
                'Content-type':'application/x-www-form-urlencoded'
            },
            body: `bookName=${bkName}&author=${bkAuthor}&pages=${bkPages}&read=${bkRead}`
        })
        location.reload()

    })()
}


function createBook(id, name, author, pages, isRead){
   
    let item = document.createElement('div')
    item.className = 'item'
    

    let itemName = document.createElement('p')
    itemName.className = 'item__Name'
  	if(name.length>15){
    	itemName.className += ' fs14'
    }
    itemName.innerHTML = name

    let itemAuthor = document.createElement('p')
    itemAuthor.className = 'item__Author'
  	if(author.length>20){
    	itemAuthor.className += ' fs14'
    }
    itemAuthor.innerHTML = `By: ${author}`
  
  	let itemPages = document.createElement('p')
    itemPages.className = 'item__Pages'
	itemPages.innerHTML = `Pages: ${pages}` 
  
  	let itemRead = document.createElement('p')
    itemRead.className = 'item__Read'
  	if(isRead==='yes'){
		itemRead.innerHTML = `Read: <input name=${id} class="is_read" checked type="checkbox">`
    } else {
    	itemRead.innerHTML = `Read: <input name=${id} class="is_read" type="checkbox">`
    }
  
  	
  	
  	let itemDelete = document.createElement('button')
    itemDelete.className = 'item__Delete'
  	itemDelete.dataset.id = id
  	itemDelete.innerHTML = 'Delete'
  
    item.append(itemName, itemAuthor, itemPages, itemRead, itemDelete)
    return item
}


async function sendEdit(action, id) {
  
    const response = await fetch('http://kast-test.ru/changeBook.php', {
    method: 'POST',
    headers: {
       'Content-type':'application/x-www-form-urlencoded'
    },
    body: `action=${action}&id=${id}`
   	});
  
}
