<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-8">
                <div class="grid gap-3 mt-3">
                    <h4 class="font-bold">
                        Reserve Hotel anywhere you want
                    </h4>
                    <span>
                        You can explore in hotels in iran cities and reserve hotel easily,
                    </span>
                    <div class="row absolute bottom-0 right-3">
                        <a href="/cities" class="btn btn-primary">
                            Explore
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img src="https://unsplash.com/photos/_pPHgeHz1uk/download?force=true&w=1920" alt="" class="rounded">
            </div>
        </div>
    </x-slot>
    <popular-cities></popular-cities>
</x-app-layout>
