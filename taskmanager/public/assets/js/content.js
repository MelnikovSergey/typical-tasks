(function(){

	function createApp(elem) {

	 //...

	}

	function createTaskItemForm() {

		var form = document.createElement('form');
		var input = document.createElement('input');
		var button = document.createElement('button'); 
		var buttonWrapper = document.createElement('div');

		buttonWrapper.classList.add('btn__wrapper');
		
		form.append(input);
		form.append(buttonWrapper);
		buttonWrapper.append(button);

		return {
			form,
			input,
			button
		}	

	}

});

