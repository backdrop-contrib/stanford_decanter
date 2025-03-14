#!/bin/bash

readarray -t adjectives <<< '\
abecedarian
adorable
adventurous
aggressive
agreeable
alert
alive
alphabetic
alphabetized
altricial
altruistic
ambiguous
amused
analphabetic
angry
annoyed
annoying
anxious
apocrine
arrogant
artesian
ashamed
attractive
average
awful
bad
beautiful
better
bewildered
black
bloody
blue
blue-eyed
blushing
bored
brainy
brave
breakable
bright
busy
calm
careful
cautious
charming
cheerful
clean
clear
clever
cloudy
clumsy
colorful
combative
comfortable
concerned
condemned
confused
cooperative
courageous
crazy
creepy
crowded
cruel
curious
cute
dangerous
dark
dead
defeated
defiant
delightful
depressed
determined
different
difficult
disgusted
distinct
disturbed
dizzy
doubtful
drab
dull
eager
easy
eccrine
egoistic
elated
elegant
embarrassed
enchanting
encouraging
energetic
enigmatic
enthusiastic
envious
evil
excited
expensive
extinct
exuberant
fair
faithful
famous
fancy
fantastic
fierce
filthy
fine
foolish
fragile
frail
frantic
friendly
frightened
funny
gentle
gifted
glamorous
gleaming
glorious
good
gorgeous
graceful
grieving
grotesque
grumpy
handsome
happy
healthy
helpful
helpless
hilarious
homeless
homely
horrible
hungry
hurt
ill
important
impossible
inexpensive
innocent
inquisitive
itchy
jealous
jittery
jolly
joyous
kind
lazy
lifeless
light
live
lively
lonely
long
lovely
lucky
magnificent
misty
modern
motionless
muddy
multivalent
mushy
mysterious
nasty
naughty
nervous
nice
nonviable
nutty
obedient
obnoxious
odd
old-fashioned
open
outrageous
outstanding
overambitious
panicky
perfect
plain
pleasant
poised
poor
powerful
precious
precocial
prickly
proud
puzzled
quaint
real
relieved
repulsive
rich
scary
selfish
shiny
shy
silly
slain
sleepy
smiling
smoggy
sore
sparkling
splendid
spotless
stillborn
stormy
strange
stupid
subartesian
successful
super
talented
tame
tender
tense
terrible
testy
thankful
thoughtful
thoughtless
tired
tough
troubled
ugliest
ugly
uncertain
uninterested
unsightly
unusual
upset
uptight
vast
victorious
vivacious
wandering
weary
wicked
wide-eyed
wild
witty
worried
worrisome
wrong
xanthous
xenophobic
xerothermic
yawning
yellowed
yucky
zany
zealous';

readarray -t nouns <<< '\
aardvark
albatross
alligator
alpaca
anaconda
angelfish
anteater
antelope
ant
ape
armadillo
baboon
badger
barracuda
bat
batfish
bear
bee
beetle
bird
bison
boar
buffalo
bug
butterfly
buzzard
camel
capuchin
capybara
cardinal
caribou
cassowary
cat
caterpillar
centipede
cheetah
chicken
chimpanzee
chinchilla
chipmunk
cicada
civet
cobra
cockroach
cod
constrictor
cormorant
cowfish
cow
coyote
crab
crane
crayfish
crocodile
crossbill
deer
dingo
dog
dogfish
dolphin
donkey
dormouse
dotterel
dove
dragonfly
duck
dugong
dunlin
eagle
earthworm
echidna
eel
eland
elephant
elk
emu
falcon
ferret
finch
fish
flamingo
flatworm
fly
fowl
fox
frog
gazelle
gecko
gerbil
gerenuk
giraffe
gnat
gnu
goat
goldfinch
goose
gorilla
goshawk
grasshopper
grouse
gull
hamster
hare
hawk
hedgehog
heron
herring
hippopotamus
hornet
horse
hummingbird
hyena
ibex
ibis
iguana
impala
jackal
jaguar
jay
jellyfish
kangaroo
kestrel
kingfisher
kinkajou
kitten
koala
kookaburra
ladybird
lark
lemur
leopard
lion
lizard
llama
lobster
loris
lynx
macaque
macaw
magpie
mallard
mamba
manatee
mandrill
mantis
manx
markhor
marten
meerkat
mink
mockingbird
mole
mongoose
monkey
moose
moth
mouse
narwhal
newt
ocelot
octopus
okapi
opossum
orangutan
oryx
osprey
ostrich
otter
owl
ox
oyster
panda
panther
parrot
partridge
peacock
peafowl
pelican
penguin
pheasant
pig
pigeon
pintail
piranha
platypus
polecat
pony
porcupine
porpoise
puffin
puma
quail
rabbit
raccoon
rat
rattlesnake
raven
reindeer
rhinoceros
rook
sable
salamander
salmon
sandpiper
sardine
seahorse
seal
shark
sheep
shrew
skunk
skylark
sloth
snail
snake
spider
squirrel
stag
starling
stoat
stork
swan
tamarin
tapir
tarantula
tarsier
termite
tern
thrush
tiger
toad
tortoise
toucan
trout
turkey
turtle
unicorn
vole
vulture
wallaby
walrus
warbler
wasp
weasel
weevil
whale
wildebeest
willet
wolf
wolverine
wombat
worm
wren
xenomorph
yak
zebra'


num=${1:-$(openssl rand -hex 2)}
adj=$((16#${num:0:2}));
nou=$((16#${num:2:4}));

echo $num;
echo "${adjectives[$adj]}-${nouns[$nou]}";