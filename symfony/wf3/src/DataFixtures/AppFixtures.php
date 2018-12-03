<?php
namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Seat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Role;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $this->loadBrands($manager);
        $this->loadSeats($manager);
        $this->loadRoles($manager);
        $manager->flush();
    }
    
    public function loadRoles(ObjectManager $manager)
    {
        $roleList = [
            'ROLE_USER',
            'ROLE_ADMIN'
        ];
        
        foreach ($roleList as $roleLabel){
            $role = new Role();
            $role->setLabel($roleLabel);
            $manager->persist($role);
        }
    }

    public function loadBrands(ObjectManager $manager)
    {
        $brandList = [
            'fiat',
            'pagani',
            'koenigsegg',
            'bugatti',
            'volkswagen',
            'renault',
            'porsche',
            'ferrari',
            'opel',
            'audi'
        ];

        foreach ($brandList as $label) {
            $brand = new Brand();
            $brand->setName($label);

            $manager->persist($brand);
        }
    }

    public function loadSeats(ObjectManager $manager)
    {
        $seatList = [
            'left front',
            'right front',
            'left back',
            'middle back',
            'right back'
        ];

        foreach ($seatList as $label) {
            $seat = new Seat();
            $seat->setLabel($label);

            $manager->persist($seat);
        }
    }
}
