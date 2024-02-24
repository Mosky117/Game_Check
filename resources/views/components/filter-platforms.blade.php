<form method="GET" action="/sortByPlatforms" class="text-white">
    @csrf
    <h2 class="text-lg font-medium mb-4">Filter by Platform</h2>
    <div class="space-y-2">
        <div>
            <input type="checkbox" name="platforms[]" value="6" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> PC
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="11" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Xbox
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="12" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Xbox 360
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="49" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Xbox One
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="169" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Xbox Series X|S
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="46" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation Vita
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="7" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="8" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation 2
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="38" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> PSP
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="9" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation 3
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="46" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation Vita
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="48" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Playstation 4
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="167" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> PlayStation 5
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="165" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> PlayStation VR
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="4" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Nintendo 64
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="5" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Nintendo Wii
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="20" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Nintendo DS
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="37" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Nintendo 3DS
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="41" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Wii U
        </div>
        <div>
            <input type="checkbox" name="platforms[]" value="130" class="form-checkbox rounded-full h-5 w-5 text-blue-600"> Nintendo Switch
        </div>
    </div>
    
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-8 rounded-full inline-block">Apply Filters</button>
</form>