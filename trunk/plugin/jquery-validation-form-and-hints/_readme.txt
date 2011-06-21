Plugin Website: http://www.icograma.com/jquery-validation-form-and-hints/


INSTRUCTIONS
1. Add jquery.form-validation-and-hints.js to your scripts directory and include it in the HTML which must also contain a version of the JQuery Library.
2. In jquery.form-validation-and-hints.js set the classprefix that you will use to link form elements in the HTML with validation rules in the JS (default is "verify").
3. Add the class "required" to wrap any field that should pass through a validation rule before submiting the form. Use any of the classes for predefined validation rules (verifyInteger, verifyURL, verifyMail) in the input inside the required wrapper.
4. Create your own validation rules in jquery.form-validation-and-hints.js declaring them inside the isTypeValidExt function.

OPTIONAL
- Use the class "iferror" to add the information text to be displayed next to the field when a validation error ocurrs after submiting the form.
- HINTS: Use the attribute title="*Hint" to add text to be displayed inside the field. This hint won't be submitted as a value and will disappear when the user makes focus on that form element. The value for the attribute title should start with * to be considered by the script as a hint.

<div class="field required">
	<p><label>Email</label> <input type="text" class="verifyMail" name="email" title="*mail@example.com" /></p>
	<p class="iferror">This field is required</p>
</div>

