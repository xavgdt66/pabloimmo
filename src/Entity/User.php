<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];  

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $presentation = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $employmentStatus = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?float $netIncome = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $guarantee = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $profilePicture = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $userType =  'standard';

    




    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $nomAgence = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $numeroRue = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $nomRue = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $carteProfessionnelle = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $siren = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $kbis = null;



    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Review::class)]
    private Collection $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials()
    {
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;
        return $this;
    }


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;
        return $this;
    }

    public function getEmploymentStatus(): ?string
    {
        return $this->employmentStatus;
    }

    public function setEmploymentStatus(?string $employmentStatus): self
    {
        $this->employmentStatus = $employmentStatus;
        return $this;
    }

    public function getNetIncome(): ?float
    {
        return $this->netIncome;
    }

    public function setNetIncome(?float $netIncome): self
    {
        $this->netIncome = $netIncome;
        return $this;
    }

    public function getGuarantee(): ?string
    {
        return $this->guarantee;
    }

    public function setGuarantee(?string $guarantee): self
    {
        $this->guarantee = $guarantee;
        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): self
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }


    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;
        return $this;
    }



    public function getNomAgence(): ?string
    {
        return $this->nomAgence;
    }

    public function setNomAgence(?string $nomAgence): self
    {
        $this->nomAgence = $nomAgence;
        return $this;
    }


    public function getnumeroRue (): ?string
    {
        return $this->numeroRue ;
    }

    public function setnumeroRue (?string $numeroRue ): self
    {
        $this->numeroRue  = $numeroRue ;
        return $this;
    }





    public function getnomRue  (): ?string
    {
        return $this->nomRue  ;
    }

    public function setnomRue  (?string $nomRue  ): self
    {
        $this->nomRue   = $nomRue  ;
        return $this;
    }




public function getcodePostal  (): ?string
    {
        return $this->codePostal  ;
    }

    public function setcodePostal  (?string $codePostal  ): self
    {
        $this->codePostal   = $codePostal  ;
        return $this;
    }




    public function getville   (): ?string
    {
        return $this->ville   ;
    }

    public function setville   (?string $ville   ): self
    {
        $this->ville    = $ville  ;
        return $this;
    }





    public function getcarteProfessionnelle    (): ?string
    {
        return $this->carteProfessionnelle    ;
    }

    public function setcarteProfessionnelle   (?string $carteProfessionnelle   ): self
    {
        $this->carteProfessionnelle    = $carteProfessionnelle  ;
        return $this;
    }




    public function getsiren     (): ?string
    {
        return $this->siren     ;
    }

    public function setsiren   (?string $siren    ): self
    {
        $this->siren     = $siren ;
        return $this;
    }



    public function getsiret     (): ?string
    {
        return $this->siret      ;
    }

    public function setsiret   (?string $siret     ): self
    {
        $this->siret      = $siret  ;
        return $this;
    }


 

    public function getkbis      (): ?string
    {
        return $this->kbis       ;
    }

    public function setkbis  (?string $kbis      ): self
    {
        $this->kbis      = $kbis ;
        return $this;
    }














    // Review related methods

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setUser($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            if ($review->getUser() === $this) {
                $review->setUser(null);
            }
        }

        return $this;
    }
}
