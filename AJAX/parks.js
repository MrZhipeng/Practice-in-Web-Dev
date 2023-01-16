 /*-------w-----------

    Assignment 4
    Name: Zhipeng Ding
    Date: 2022-08-09
    Description: Assignment 4
    
--------------------*/

document.addEventListener("DOMContentLoaded", load);


function load()
{
	document.getElementById("search").addEventListener("click", validate);
}

function validate(event)
{
	event.preventDefault();

	const inputText = document.getElementById("input_text");
	const searchTerm = inputText.value.trim();
	if(searchTerm !== "")
	{
		fetchData(searchTerm);
	}
}

function fetchData(searchTerm)
{
	const apiUrl = 'https://data.winnipeg.ca/resource/tx3d-pfxq.json?' +
                `$where=park_name LIKE '%${searchTerm}%'` +
                '&$order=park_name DESC' +
                '&$limit=10';

	fetch(encodeURI(apiUrl))
    .then(result => result.json())
    .then(parks => processSearchResults(parks, searchTerm));
}

function processSearchResults(parks, searchTerm)
{
	
	displayParkTables(parks, searchTerm);
	displayInformation(parks, searchTerm);
	console.log(parks);
}

function displayInformation(parks, searchTerm)
{
	const notFoundMessage = document.getElementById("notFound");
	const foundMessage = document.getElementById("found");

	notFoundMessage.innerHTML = `There is no park or space named ${searchTerm}.`;
	foundMessage.innerHTML = `Here is tables of parks with the name ${searchTerm}:`;

	if(parks.length > 0)
	{
		notFoundMessage.style.display = "none";
		foundMessage.style.display = "block";
	}
	else
	{
		notFoundMessage.style.display = "block";
		foundMessage.style.display = "none";
	}
}

function displayParkTables(parks,searchTerm)
{
	const body = document.getElementsByTagName("body")[0];
	const area = document.getElementById("parkTables");

	for(let i = 0; i < parks.length; i++)
	{
		let section = document.createElement("section");
		let h2 = document.createElement("h2");
		let ul = document.createElement("ul");
		let keys = ["park_name", "location_description", "district", "neighbourhood",
                    "CCA", "area_in_hectares", "water_area_in_hectares"];
        let values = [];
        values.push(parks[i].park_name);
        values.push(parks[i].location_description);
        values.push(parks[i].district);
        values.push(parks[i].neighbourhood);
        values.push(parks[i].cca);
        values.push(parks[i].area_in_hectares);
        values.push(parks[i].water_area_in_hectares);

        body.insertBefore(section, area);

	    h2.innerHTML = `Details of ${values[0]}`;

        section.appendChild(h2);
        section.appendChild(ul);

		for (let j = 0; j < keys.length; j++)
		{
			let li = document.createElement("li");
			let label = document.createElement("label");
			let span = document.createElement("span");
			label.innerHTML = `${keys[j]}`;
			span.innerHTML = `${values[j]}`;

			li.appendChild(label);
			li.appendChild(span);
			ul.appendChild(li);
		}
	}
}