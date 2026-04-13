<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardingHouse;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;



class BoardingHouseController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }
    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);

        return view('pages.boarding-house.show', compact('boardingHouse'));
    }

    public function rooms($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);

        return view('pages.boarding-house.rooms', compact('boardingHouse'));
    }
    public function find()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $cities = $this->cityRepository->getAllCities();

        return view('pages.boarding-house.find', compact('categories', 'cities'));
    }

    public function findresult(Request $request)
    {
        $query = BoardingHouse::query();

        // Filter berdasarkan Kota
        if ($request->has('city')) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('slug', $request->city);
            });
        }

        // Filter berdasarkan Kategori
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $boardingHouses = $query->get();

        return view('pages.boarding-house.index', compact('boardingHouses'));
    }
}
