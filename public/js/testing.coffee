message = "Ready for some cofee"
alert(message)

keeprunning() unless tired

coffee = ->
	confirm "Ready for some coffee?"
	"Youre answer is " + answer

coffee = (message = "Ready for some coffee?") ->
	answer confirm message
	"Your answer is #{answer}"