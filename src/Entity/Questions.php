<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionsRepository;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Validator\Constraints\Regex;
#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $questionId= null;

    #[ORM\Column(length: 50)]
   
    #[Assert\Regex(pattern: '/\?$/', message: "la question doit se terminer par un point d\'interrogation")]

    private ?string $question=null;

    #[ORM\Column(length: 20)]
    private $type;

    
    #[ORM\ManyToOne(inversedBy:'questions')]
    #[ORM\JoinColumn(name:'sondage_id')]

    private ?Sondage $sondage = null;
     
     

    public function getQuestionId(): ?int
    {
        return $this->questionId;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSondage(): ?Sondage
    {
        return $this->sondage;
    }

    public function setSondage(?Sondage $sondage): self
    {
        $this->sondage = $sondage;

        return $this;
    }


}
