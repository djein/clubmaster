<?php

namespace Club\MatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club\MatchBundle\Entity\MatchTeam
 *
 * @ORM\Table(name="club_match_match_team")
 * @ORM\Entity(repositoryClass="Club\MatchBundle\Entity\MatchTeamRepository")
 */
class MatchTeam
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $set_won
     *
     * @ORM\Column(type="integer")
     */
    private $set_won;

    /**
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="match_teams")
     * @ORM\JoinColumn(name="match_id", onDelete="cascade")
     *
     * @var Club\MatchBundle\Entity\Match
     */
    protected $match;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="match_teams")
     * @ORM\JoinColumn(onDelete="cascade")
     *
     * @var Club\MatchBundle\Entity\Team
     */
    protected $team;

    /**
     * @var Club\MatchBundle\Entity\MatchTeamSet
     *
     * @ORM\OneToMany(targetEntity="MatchTeamSet", mappedBy="match_team", cascade={"persist"})
     */
    protected $match_team_set;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set match
     *
     * @param Club\MatchBundle\Entity\Match $match
     */
    public function setMatch(\Club\MatchBundle\Entity\Match $match)
    {
        $this->match = $match;
    }

    /**
     * Get match
     *
     * @return Club\MatchBundle\Entity\Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Add match_team_set
     *
     * @param Club\MatchBundle\Entity\MatchTeamSet $matchTeamSet
     */
    public function addMatchTeamSet(\Club\MatchBundle\Entity\MatchTeamSet $matchTeamSet)
    {
        $this->match_team_set[] = $matchTeamSet;
    }

    /**
     * Get match_team_set
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getMatchTeamSet()
    {
        return $this->match_team_set;
    }
    public function __construct()
    {
        $this->match_team_set = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setSetWon(0);
    }

    /**
     * Set team
     *
     * @param Club\MatchBundle\Entity\Team $team
     */
    public function setTeam(\Club\MatchBundle\Entity\Team $team)
    {
        $this->team = $team;
    }

    /**
     * Get team
     *
     * @return Club\MatchBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set set_won
     *
     * @param integer $setWon
     */
    public function setSetWon($setWon)
    {
        $this->set_won = $setWon;
    }

    /**
     * Get set_won
     *
     * @return integer
     */
    public function getSetWon()
    {
        return $this->set_won;
    }

    /**
     * Remove match_team_set
     *
     * @param Club\MatchBundle\Entity\MatchTeamSet $matchTeamSet
     */
    public function removeMatchTeamSet(\Club\MatchBundle\Entity\MatchTeamSet $matchTeamSet)
    {
        $this->match_team_set->removeElement($matchTeamSet);
    }
}
