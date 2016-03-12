	var dragsort = ToolMan.dragsort()
	var junkdrawer = ToolMan.junkdrawer()

	window.onload = function() {
		//junkdrawer.restoreListOrder("numeric")
		//junkdrawer.restoreListOrder("phonetic1")
		//junkdrawer.restoreListOrder("phonetic2")
		junkdrawer.restoreListOrder("phonetic3")
		//junkdrawer.restoreListOrder("phoneticlong")
		//junkdrawer.restoreListOrder("boxes")
		//junkdrawer.restoreListOrder("buttons")
		//junkdrawer.restoreListOrder("twolists1")
		//junkdrawer.restoreListOrder("twolists2")

/*		dragsort.makeListSortable(document.getElementById("numeric"),
				verticalOnly, saveOrder)

		dragsort.makeListSortable(document.getElementById("phonetic1"),
				verticalOnly, saveOrder)
		dragsort.makeListSortable(document.getElementById("phonetic2"),
				verticalOnly, saveOrder)*/
		dragsort.makeListSortable(document.getElementById("phonetic3"),
				verticalOnly, saveOrder)
/*		dragsort.makeListSortable(document.getElementById("phoneticlong"),
				verticalOnly, saveOrder)

		dragsort.makeListSortable(document.getElementById("boxes"),
				saveOrder)

		dragsort.makeListSortable(document.getElementById("buttons"),
				saveOrder)

		
		dragsort.makeListSortable(document.getElementById("twolists1"),
				saveOrder)
		dragsort.makeListSortable(document.getElementById("twolists2"),
				saveOrder)
		
*/	}

	function verticalOnly(item) {
		item.toolManDragGroup.verticalOnly()
	}

	function speak(id, what) {
		var element = document.getElementById(id);
		element.innerHTML = 'Clicked ' + what;
	}

	function saveOrder(item) {
		var group = item.toolManDragGroup
		var list = group.element.parentNode
		var id = list.getAttribute("id")
		if (id == null) return
		group.register('dragend', function() {
			ToolMan.cookies().set("list-" + id, 
					junkdrawer.serializeList(list), 365)
		})
	}

	//-->