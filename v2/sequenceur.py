from kivy.uix.boxlayout import BoxLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.togglebutton import ToggleButton
from kivy.uix.scrollview import ScrollView
from kivy.properties import StringProperty, Property

class PanelItem(BoxLayout):
    instance = None
    def __init__(self,**kwargs):
        super(PanelItem, self).__init__(**kwargs)
        PanelItem.instance = self
    def addItem(self):
        print("try again to additem")
        ToggleButtons.addItem(ToggleButton(text='#00', size_hint=(None,1),group= "SequenceItem"))
    def updatePanel(self,widgetSeq):
        print("try to update panel with ",widgetSeq)
        self.ids["itemEntity"].ids["itemName"].text = widgetSeq.nom
        self.ids["itemEntity"].ids["itemType"].text = self.ids["itemEntity"].ids["itemType"].values[widgetSeq.type]
        self.ids["itemEntity"].ids["itemDescr"].text = widgetSeq.descr
class ToggleButtons(BoxLayout):
    """docstring for Sequence."""
    instance = None
    selected = Property(None)
    index = None # index of the selected in widgets

    def __init__(self,**kwargs):
        super(ToggleButtons, self).__init__(**kwargs)
        ToggleButtons.instance = self

        self.widgets = [] # all the sequence is in there!
        self.loadWidgets()

        self.updateUI()

    def updateUI(self):
        self.clear_widgets()

        grid = GridLayout(rows=1, size_hint=(None,None))
        grid.bind(minimum_width=grid.setter('width'))

        for i in self.widgets:
            grid.add_widget(WidgetSequenceur(i,text=i["name"], size_hint=(None,1),group= "SequenceItem"))

        scroll = ScrollView( size_hint=(1,1), do_scroll_x=True, do_scroll_y=False )
        scroll.add_widget(grid)

        self.add_widget(scroll)

    def updateEntity(self, clicked):
        if(clicked.state == "down"):
            ToggleButtons.selected = clicked

            #find a way to get the index
            selectedIndex = None
            for i, wid in enumerate(self.widgets):
                print(wid)
                if(wid["name"] == clicked.nom):
                    selectedIndex = i

            ToggleButtons.index = selectedIndex
            PanelItem.instance.updatePanel(clicked)
        else:
            ToggleButtons.selected = None
            ToggleButtons.index = None
            PanelItem.instance.updatePanel(WidgetSequenceur({"name":"","type":0,"descr":""}))
        print(ToggleButtons.selected)

    def loadWidgets(self):
        for i in range(0):
            obj = {
            "name": "fez"+str(i),
            "type": 0,
            "descr": ""
            }
            self.widgets.append(obj)

    @staticmethod
    def addItem(widget):
        obj = {
        "name": "",
        "type": 0,
        "descr": ""
        }
        ToggleButtons.instance.widgets.append(obj)
        ToggleButtons.instance.updateUI()

class ItemEntity(BoxLayout):
    def __init__(self,**kwargs):
        super(ItemEntity,self).__init__(**kwargs)
    def save(self):
        print("**save to children")
        # print("name : ",self.ids["itemName"].text)
        # print("type : ",self.ids["itemType"].text)
        # print("descr : ",self.ids["itemDescr"].text)
        i = ToggleButtons.index
        print(ToggleButtons.selected)
        print(i)

        for j in ToggleButtons.instance.widgets:
            print(j)
        print("\n")
        #print(ToggleButtons.instance.widgets[i])

        if(not i == None):
            ToggleButtons.instance.widgets[i]["name"] = self.ids["itemName"].text
            ToggleButtons.instance.widgets[i]["descr"] = self.ids["itemDescr"].text

        #print(ToggleButtons.instance.widgets[i])



        ToggleButtons.selected = None
        ToggleButtons.index = None
        PanelItem.instance.updatePanel(WidgetSequenceur({"name":"","type":0,"descr":""}))
        ToggleButtons.instance.updateUI()


class WidgetSequenceur(ToggleButton):
    def __init__(self,obj,**kwargs):
        super(WidgetSequenceur,self).__init__(**kwargs)
        print("********new wdget sequenceur")
        self.nom = obj["name"]
        self.type = obj["type"]
        self.descr = obj["descr"]

    def on_press(self):
        print("toggled")
        ToggleButtons.instance.updateEntity(self)
