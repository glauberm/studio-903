<form
	method="post"
	action="javascript:void(0);"
	class="form"
>
	<div class="form__row">
		<div class="form__field">
			<label for="calendar-start-date">Start date</label>
			<input type="text" name="calendar-start-date" id="calendar-start-date" />
			<div class="form__popover" id="calendar-start-date__popover">
				<div id="calendar-start-date__popover-inner"></div>
			</div>
		</div>
		<div class="form__field">
			<label for="calendar-start-time">Start time</label>
			<select name="calendar-start-time" id="calendar-start-time" disabled>
			</select>
		</div>
	</div>

	<div class="form__row">
		<div class="form__field">
			<label for="calendar-end-date">End date</label>
			<input type="text" name="calendar-end-date" id="calendar-end-date" />
			<div class="form__popover">
				<div id="calendar-end-date__popover"></div>
			</div>
		</div>
		<div class="form__field">
			<label for="calendar-end-time">End time</label>
			<select name="calendar-end-time" id="calendar-end-time" disabled>
			</select>
		</div>
	</div>

	<div class="form__field">
		<label for="calendar-title">Title</label>
		<input type="text" name="calendar-title" id="calendar-title" />
	</div>

	<div class="form__field">
		<label for="calendar-message">Description</label>
		<textarea name="calendar-message" id="calendar-message"></textarea>
	</div>

	<div class="form__row">
		<div class="form__field">
			<label for="calendar-contact-method">Preferred contact method</label>
			<select name="calendar-contact-method" id="calendar-contact-method">
				<option>WhatsApp</option>
				<option>Email</option>
			</select>
		</div>
		<div class="form__field">
			<label for="calendar-contact-value">Phone number</label>
			<input type="tel" name="calendar-contact-value" id="calendar-contact-value" />
		</div>
	</div>

</form>