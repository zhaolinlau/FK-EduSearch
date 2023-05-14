$.fn.dataTable.Buttons.defaults.dom.button.className =
	"btn btn-outline-primary";
$("#user_table").DataTable({
	language: {
		searchPlaceholder: "Search by a field...",
	},
	dom: "Bfrtip",
	buttons: [
		"colvis",
		"pageLength",
		{
			extend: "collection",
			text: "Export",
			buttons: ["csv", "excel", "pdf"],
		},
		"print",
	],
});
